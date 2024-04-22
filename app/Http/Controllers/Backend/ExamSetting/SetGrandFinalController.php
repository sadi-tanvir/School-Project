<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\GrandFinal;
use Illuminate\Http\Request;

class SetGrandFinalController extends Controller
{
    public function GrandFinal($schoolCode)
    {
        $examName = AddClassExam::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();


        return view('Backend/BasicInfo/ExamSetting/grandFinal', compact('classData', 'examName'));
    }

    public function store_grandFinal(Request $request, $schoolCode)
    {
        // Validate form data...

        $classNames = $request->input('class_name', []);
        $examNames = $request->input('class_exam_name', []);

        if ($classNames === null) {
            return redirect()->route('grandfinal',$schoolCode)->with([
                'error' => 'Please select subject name!',
            ]);
        }
        // dd($subjectNames);
        $existingData = GrandFinal::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $request->class_name)
            ->where('class_exam_name', $request->class_exam_name)
            ->where('percentage', $request->percentage)
            ->where('serial', $request->serial)
            ->get();

        if ($existingData->isNotEmpty()) {
            return redirect()->route('grandfinal',$schoolCode)->with([
                'error' => 'All Ready Added',
            ]);
        }



      
        if (is_array($classNames)) {
            
            foreach ($classNames as $class) {
                if (is_array($examNames)) {
                   // dd($examNames);
                    foreach ($examNames as $key => $exam) {
                        $addClassSubject = new GrandFinal();
                        $addClassSubject->class_name = $class;
                        $addClassSubject->class_exam_name = $exam;
                        $addClassSubject->percentage = $request->input("percentage.$key", 0);
                        $addClassSubject->serial = $request->input("serial.$key", 0);
                        $addClassSubject->status = $request->input("status.$key", 'active');
                        $addClassSubject->action = 'approved';
                        $addClassSubject->school_code = $schoolCode;
                        $addClassSubject->save();
                        //dd($addClassSubject->percentage);
                        //dd($addClassSubject->percentage);
                    }
                } else {
                    $addClassSubject = new GrandFinal();
                    $addClassSubject->class_name = $classNames;
                    $addClassSubject->class_exam_name = $examNames;
                    $addClassSubject->percentage = $request->percentage;
                    $addClassSubject->serial = $request->serial;
                    $addClassSubject->status = $request->status;
                    $addClassSubject->action = 'approved';
                    $addClassSubject->school_code = $schoolCode;
                    $addClassSubject->save();
                }
            }
        } 
        
        else {
            $addClassSubject = new GrandFinal();
            $addClassSubject->class_name = $classNames;
            $addClassSubject->class_exam_name = $examNames;
            $addClassSubject->percentage = $request->percentage;
            $addClassSubject->serial = $request->serial;
            $addClassSubject->status = $request->status;
            $addClassSubject->action = 'approved';
            $addClassSubject->school_code = $schoolCode;
            $addClassSubject->save();
            
        }
        

        return redirect()->route('grandfinal', $schoolCode)->with([
            'success' => 'Added successfully!',
        ]);
    }
}
