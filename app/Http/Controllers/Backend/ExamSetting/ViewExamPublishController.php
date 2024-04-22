<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\ExamPublish;
use Illuminate\Http\Request;

class ViewExamPublishController extends Controller
{
    public function ViewExamPublish($schoolCode){
        $classes=AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $years=AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $exam=AddClassExam::where('action', 'approved')->where('school_code', $schoolCode)->get();
        //$school_code = '100';
        $Data = ExamPublish::where('action', 'approved')->where('school_code', $schoolCode)->get();

        return view ('Backend/BasicInfo/ExamSetting/viewExamPublish',compact("classes","years","exam","Data"));
    }

    public function delete_add_exam($id)
    {
        $report = ExamPublish::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('success', 'Report deleted successfully!');
    }
}
