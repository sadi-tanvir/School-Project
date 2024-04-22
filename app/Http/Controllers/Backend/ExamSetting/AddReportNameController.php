<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddReportName;
use Illuminate\Http\Request;

class AddReportNameController extends Controller
{
    public function add_report($schoolCode)
    {
        
        //$school_code = '100';
        $reportData = AddReportName::where('action', 'approved')->where('school_code', $schoolCode)->get();
       
        return view('Backend/BasicInfo/ExamSetting/addReportName', compact('reportData'));
    }
    
    public function store_add_report(Request $request,$schoolCode)
    {
        // Validate the incoming request data
        $request->validate([
            'report_name' => 'required|string|max:255',
            'status' => 'required|string|in:active,in active',
        ]);

        // Set the school code
        //$school_code = '100'; // Your school code here

        // Check if any record with the same school_code, class_name, or position already exists
        $existingRecord = AddReportName::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('report_name', $request->report_name);
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same report name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $report = new AddReportName();
        $report->report_name = $request->report_name;
        $report->status = $request->status;
        // dd($class);
        $report->action = 'approved';
        $report->school_code = $schoolCode;

        // Save the new record
        $report->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Report added successfully!');
    }

    public function delete_add_report($id)
    {
        $report = AddReportName::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('success', 'Report deleted successfully!');
    }
}
