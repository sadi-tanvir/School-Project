<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddPeriod;
use Illuminate\Http\Request;

class AddPeriodController extends Controller
{
    public function add_period($schoolCode)
    {

       //$school_code = '100';
        $periodData = AddPeriod::where('action', 'approved')->where('school_code', $schoolCode)->get();

        return view('Backend/BasicInfo/CommonSetting/addPeriod', compact('periodData'));
    }

    public function store_add_period(Request $request,$schoolCode)
    {
        // Validate the incoming request data
        $request->validate([
            'class_period' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|string|in:active,in active',
        ]);

        // Set the school code
       // $school_code = '100'; // Your school code here

        // Check if any record with the same school_code, class_period, or position already exists
        $existingRecord = AddPeriod::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('class_period', $request->class_period)
                    ->orWhere('position', $request->position);
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same period name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $period = new AddPeriod();
        $period->class_period = $request->class_period;
        $period->position = $request->position;
        $period->status = $request->status;
        // dd($period);
        $period->action = 'approved';
        $period->school_code = $schoolCode;

        // Save the new record
        $period->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'period added successfully!');
    }

    public function delete_add_period($id)
    {
        $period = AddPeriod::findOrFail($id);
        $period->delete();
        return redirect()->back()->with('success', 'period deleted successfully!');
    }
}
