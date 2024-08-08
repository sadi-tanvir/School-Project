<?php

namespace App\Http\Controllers\Backend\ReportsExamsReports;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddSection;
use App\Models\AddGroup;
use App\Models\ExamMarkInput;
use App\Models\ExamProcess;
use App\Models\SchoolInfo;
use App\Models\SequentialExam;
use App\Models\SetClassExamMark;
use App\Models\SetShortCode;
use App\Models\Student;
use Illuminate\Http\Request;

class TebulationsFormat2Controller extends Controller
{
    public function format2($schoolCode)
    {
        $classes = AddClass::where("action", "approved")->where("school_code", $schoolCode)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $schoolCode)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $schoolCode)->get();
        $examName = AddClassExam::where("action", "approved")->where("school_code", $schoolCode)->get();
        $years = AddAcademicYear::where("action", "approved")->where("school_code", $schoolCode)->get();
        return view('/Backend/Report(exam&result)/format2', compact('classes', 'sections', 'groups', 'examName', 'years'));
    }

    public function tabulation2(Request $request, $school_code)
    {
        //dd($request);
        $year = $request->year;
        $class = $request->class;
        $group = $request->group;
        $section = $request->section;
        $exam = $request->exam_name;
        $id = $request->id;
        //dd($id);
        if($id==null){

            $student = Student::where("action", "approved")->where("school_code", $school_code)->where("year", $year)->where("Class_name", $class)->where("group", $group)->where("section", $section)->get();
        }
        else{
            $student = Student::where("action", "approved")->where("school_code", $school_code)->where("student_id", $id)->where("year", $year)->where("Class_name", $class)->where("group", $group)->where("section", $section)->get();
        }
        $school_info = SchoolInfo::where('school_code', $school_code)->first();

        $shortCode=SetShortCode::where("action", "approved")->where("school_code", $school_code)->where('class_name',$class)->where('class_exam_name',$exam)->where('academic_year_name',$year)->get();
        
        $shortCount=SetShortCode::where("action", "approved")->where("school_code", $school_code)->where('class_name',$class)->where('class_exam_name',$exam)->where('academic_year_name',$year)->count();
        $count=5+$shortCount;

        $subject=ExamMarkInput::where("action", "approved")->where("school_code", $school_code)->where('class_name',$class)->where('exam_name',$exam)->where('year',$year)-> select('subject')
        ->distinct()
        ->get()
        ->pluck('subject')
        ->toArray();

        $marks=ExamMarkInput::where("action", "approved")->where("school_code", $school_code)->where("year", $year)->where("Class_name", $class)->where("group", $group)->where("section", $section)->get();
       
        //dd($marks);
        return view('/Backend/Report(exam&result)/downloadformat2', compact('class', 'group', 'section', 'exam', 'year','student','id','school_info','shortCode','count','subject','marks','shortCount'));


    }
}
