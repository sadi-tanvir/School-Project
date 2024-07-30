<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassWiseSubject;
use App\Models\AddGroup;
use Illuminate\Http\Request;

class SubjectSetupViewController extends Controller
{
    public function viewSubjectSetup($school_code)
    {
        $subject=null;
        $classes=AddClass::where('school_code',$school_code)->where('action','approved')->get();
        $groups=AddGroup::where('school_code',$school_code)->where('action','approved')->get();
        return view('Backend.BasicInfo.ExamSetting.subjectSetupView', compact('classes','groups','subject'));
    }

    public function getSubjectConfigData(Request $request,$school_code)
    {
        //dd($request);
        $classes=AddClass::where('school_code',$school_code)->where('action','approved')->get();
        $groups=AddGroup::where('school_code',$school_code)->where('action','approved')->get();
        $class=$request->class;
        $group=$request->group;
        $subject=AddClassWiseSubject::where('school_code',$school_code)->where('action','approved')->where('action','approved')->where('class_name',$class)->where('group_name',$group)->get();
        return view('Backend.BasicInfo.ExamSetting.subjectSetupView', compact('subject','classes','groups'))
        ->with('class', $request->class)
        ->with('group', $request->group);
    }
}
