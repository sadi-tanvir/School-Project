<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;

use App\Models\SequentialExam;

use Illuminate\Http\Request;

class SequentialWiseExamController extends Controller
{
    public function SequentialExam(Request $request,$schoolCode){
        $searchClassData = null;
        $searchClassExamName = null;
        $searchAcademicYearName = null;
        $setCodeData = null;
        $shortCodeData = null;

        $sequentialExamData = SequentialExam::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();


        return view ('Backend/BasicInfo/ExamSetting/sequentialExam',compact('sequentialExamData','classData', 'classExamData', 'academicYearData', 'searchClassData', 'searchClassExamName', 'searchAcademicYearName'));
    }

    public function store_sequential_exam(Request $request,$schoolCode)
    {
        // dd($request);
        // Validate form data
        $request->validate([
            'class_name' => 'required|string',
            'exam_name' => 'required|string',
            'year' => 'required|string',
        ]);

        //$school_code = '100';
        $generateId = SequentialExam::count() + 1;
        $generatedId = sprintf('%02d', $generateId);

        $exam = $request->sequential_exam;



        if ($exam === null) {
            return redirect()->route('sequentialExam',$schoolCode)->with([
                'error' => 'Please select sequential exam name!',
                'class_name' => $request->class_name,
                'exam_name' => $request->exam_name,
                'year' => $request->year
            ]);
        }
        // dd($subjectNames);
        $existingData = SequentialExam::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $request->class_name)
            ->where('exam_name', $request->exam_name)
            ->where('year', $request->year)
            ->get();

        if ($existingData->isNotEmpty()) {
            return redirect()->route('sequentialExam',$schoolCode)->with([
                'error' => 'All Ready Added',
                'class_name' => $request->class_name,
                'exam_name' => $request->exam_name,
                'year' => $request->year
            ]);
        }


        // dd($existingData);
       
            // Handle the case when only a single subject is received
            $addexam = new SequentialExam();
            $addexam->class_name = $request->class_name;
            $addexam->exam_name = $request->exam_name;
            $addexam->year = $request->year;
            $addexam->sequential_exam = $request->sequential_exam;
            $addexam->action = 'approved';
            $addexam->school_code = $schoolCode;

            $addexam->save();
        

        return redirect()->route('sequentialExam',$schoolCode)->with([
            'success' => 'Sequential exam added successfully!',
            'class_name' => $request->class_name,
            'exam_name' => $request->exam_name,
            'year' => $request->year
        ]);

    }
}
