<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddShortCode;
use Illuminate\Http\Request;

class AddShortCodeController extends Controller
{
    public function add_short_code($schoolCode)
    {
       // $school_code = '100';
        $shortCodeData = AddShortCode::where('action', 'approved')->where('school_code', $schoolCode)->get();

        return view('Backend/BasicInfo/ExamSetting/addShortCode', compact('shortCodeData'));
    }


    public function store_add_short_code(Request $request,$schoolCode)
    {

        // dd($request);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'short_code' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|string|in:active,in active',
        ]);
        // dd($validatedData);

        // Set the school code
       // $school_code = '100'; // Your school code here


        // If no duplicate record is found, proceed to create a new record
        $shortCode = new AddShortCode();
        $shortCode->short_code = $request->short_code;
        $shortCode->position = $request->position;
        $shortCode->status = $request->status;
        $shortCode->action = 'approved';
        $shortCode->school_code = $schoolCode;

        // dd($shortCode);

        // Save the new record
        $shortCode->save();


        // Redirect back with a success message
        return redirect()->back()->with('success', 'group added successfully!');
    }

    public function delete_add_short_code($id)
    {
        $shortCode = AddShortCode::findOrFail($id);
        $shortCode->delete();
        return redirect()->back()->with('success', 'group deleted successfully!');
    }
}
