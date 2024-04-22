<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\ExamPublish;
use Illuminate\Http\Request;

class ExamPublishController extends Controller
{
    public function ExamPublish($schoolCode){
        $Data = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classes=AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $years=AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $exam=AddClassExam::where('action', 'approved')->where('school_code', $schoolCode)->get();

        return view ('Backend/BasicInfo/ExamSetting/examPublish',compact("classes","years","exam","Data"));
    }

    public function store_add_exam_publish(Request $request,$schoolCode)
    {
        // Validate the incoming request data
        $request->validate([
            'Class_name' => 'required|string|max:255',
            'exam_name' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'status' => 'required|string|in:active,in active',
        ]);

        // Set the school code
       // $school_code = '100'; // Your school code here

        // Check if any record with the same school_code, class_name, or position already exists
        $existingRecord = ExamPublish::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('Class_name', $request->Class_name)
                ->Where('exam_name', $request->exam_name)
                ->Where('year', $request->year)
                ->Where('status', $request->status);
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same exam name or class already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $exam = new ExamPublish();
        $exam->Class_name = $request->Class_name;
        $exam->exam_name = $request->exam_name;
        $exam->year = $request->year;
        $exam->status = $request->status;
        // dd($class);
        $exam->action = 'approved';
        $exam->school_code = $schoolCode;

        // Save the new record
        $exam->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'exam publish added successfully!');
    }

    

   
}
