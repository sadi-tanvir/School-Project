<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use Illuminate\Http\Request;

class AddAcademicYearController extends Controller
{
    public function add_academic_year($schoolCode)
    {
        //$school_code = '100';
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        // dd($academicYearData);
        return view('Backend/BasicInfo/CommonSetting/addAcademicYear', compact('academicYearData'));
    }


    public function store_add_academic_year(Request $request,$schoolCode)
    {

        // dd($request);
        // Validate the incoming request data
        $request->validate([
            'academic_year_name' => 'required|string|max:255',
            'status' => 'required|string|in:active,in active',
        ]);



        // Set the school code
       // $school_code = '100'; // Your school code here

        // Check if any record with the same school_code, academic_year_name, or position already exists
        $existingRecord = AddAcademicYear::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('academic_year_name', $request->academic_year_name);
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same academic year name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $academicYear = new AddAcademicYear();
        $academicYear->academic_year_name = $request->academic_year_name;

        $academicYear->status = $request->status;
        // dd($academicYear);
        $academicYear->action = 'approved';
        $academicYear->school_code = $schoolCode;

        // Save the new record
        $academicYear->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'academic year added successfully!');
    }

    public function delete_add_academic_year($id)
    {
        $academicYear = AddAcademicYear::findOrFail($id);
        $academicYear->delete();
        return redirect()->back()->with('success', 'academic year deleted successfully!');
    }
}
