<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClassExam;
use Illuminate\Http\Request;

class AddClassExamController extends Controller
{
    public function add_class_exam($schoolCode)
    {
        
        //$school_code = '100';
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $schoolCode)->get();
       
        return view('Backend/BasicInfo/CommonSetting/addClassExam', compact('classExamData'));
    }
    
    public function store_add_class_exam(Request $request,$schoolCode)
    {
        // Validate the incoming request data
        $request->validate([
            'class_exam_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|string|in:active,in active',
        ]);

        // Set the school code
       // $school_code = '100'; // Your school code here

        // Check if any record with the same school_code, class_exam_name, or position already exists
        $existingRecord = AddClassExam::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('class_exam_name', $request->class_exam_name)
                    ->orWhere('position', $request->position);
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same class exam name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $classExam = new AddClassExam();
        $classExam->class_exam_name = $request->class_exam_name;
        $classExam->position = $request->position;
        $classExam->status = $request->status;
        // dd($classExam);
        $classExam->action = 'approved';
        $classExam->school_code = $schoolCode;

        // Save the new record
        $classExam->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'class exam added successfully!');
    }

    public function delete_add_class_exam($id)
    {
        $classExam = AddClassExam::findOrFail($id);
        $classExam->delete();
        return redirect()->back()->with('success', 'class exam deleted successfully!');
    }
}
