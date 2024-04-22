<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddShift;
use Illuminate\Http\Request;

class AddShiftController extends Controller
{
    public function add_shift($schoolCode)
    {
        
        //$school_code = '100';
        $shiftData = AddShift::where('action', 'approved')->where('school_code', $schoolCode)->get();
       
        return view('Backend/BasicInfo/CommonSetting/addShift', compact('shiftData'));
    }
    

    public function store_add_shift(Request $request,$schoolCode)
    {

        // dd($request);
        // Validate the incoming request data
        $request->validate([
            'shift_name' => 'required|string|max:255',            
            'status' => 'required|string|in:active,in active',
        ]);

       

        // Set the school code
        //$school_code = '100'; // Your school code here

        // Check if any record with the same school_code, shift_name, or position already exists
        $existingRecord = AddShift::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('shift_name', $request->shift_name);                   
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same shift name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $shift = new AddShift();
        $shift->shift_name = $request->shift_name;
        
        $shift->status = $request->status;
        // dd($shift);
        $shift->action = 'approved';
        $shift->school_code = $schoolCode;

        // Save the new record
        $shift->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'shift added successfully!');
    }

    public function delete_add_shift($id)
    {
        $shift = AddShift::findOrFail($id);
        $shift->delete();
        return redirect()->back()->with('success', 'shift deleted successfully!');
    }
}
