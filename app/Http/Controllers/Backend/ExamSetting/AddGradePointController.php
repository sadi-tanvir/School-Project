<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddGradePoint;
use Illuminate\Http\Request;

class AddGradePointController extends Controller
{
    public function add_grade_point($schoolCode)
    {
        //$school_code = '100';
        $gradePointData = AddGradePoint::where('action', 'approved')->where('school_code', $schoolCode)->get();

        return view('Backend/BasicInfo/ExamSetting/addGradePoint', compact('gradePointData'));
    }


    public function store_add_grade_point(Request $request,$schoolCode)
    {

        // dd($request);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'mark_point_1st' => 'required|string|max:255',
            'mark_point_2nd' => 'required|string|max:255',
            'grade_point' => 'required|string|max:255',
            'letter_grade' => 'required|string|max:255',
            'note' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
        ]);
        // dd($validatedData);

        // Set the school code
       // $school_code = '100'; // Your school code here

        // Check if any record with the same school_code, group_name, or position already exists
        // $existingRecord = AddGradePoint::where('school_code', $school_code)
        //     ->where(function ($query) use ($request) {
        //         $query->where('mark_point_1st', $request->mark_point_1st)
        //             ->orWhere('mark_point_2nd', $request->mark_point_2nd)
        //             ->orWhere('grade_point', $request->grade_point)
        //             ->orWhere('letter_grade', $request->letter_grade);
        //     })
        //     ->exists();


        // If a record with the same combination already exists, return with an error message
        // if ($existingRecord) {
        //     return redirect()->back()->with('error', 'A record with the same group name or position already exists for this school.');
        // }

        // If no duplicate record is found, proceed to create a new record
        $gradePoint = new AddGradePoint();
        $gradePoint->mark_point_1st = $request->mark_point_1st;
        $gradePoint->mark_point_2nd = $request->mark_point_2nd;
        $gradePoint->grade_point = $request->grade_point;
        $gradePoint->letter_grade = $request->letter_grade;
        $gradePoint->note = $request->note;
        $gradePoint->status = $request->status;
        $gradePoint->action = 'approved';
        $gradePoint->school_code = $schoolCode;

        // dd($gradePoint);

        // Save the new record
        $gradePoint->save();


        // Redirect back with a success message
        return redirect()->back()->with('success', 'group added successfully!');
    }

    public function delete_add_grade_point($id)
    {
        $gradePoint = AddGradePoint::findOrFail($id);
        $gradePoint->delete();
        return redirect()->back()->with('success', 'group deleted successfully!');
    }
}
