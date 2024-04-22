<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClass;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentListWithPhotoController extends Controller
{
    public function studentListWithPhoto($schoolCode){
        $classes=AddClass::where("action", "approved")->where("school_code",$schoolCode)->get();
        $sections=AddSection::where("action", "approved")->where("school_code",$schoolCode)->get();
        $groups=AddGroup::where("action", "approved")->where("school_code",$schoolCode)->get();
        $years=AddAcademicYear::where("action", "approved")->where("school_code",$schoolCode)->get();
        $categories=AddCategory::where("action", "approved")->where("school_code",$schoolCode)->get();
        $columns=['gender', 'religious','father_name','mother_name','birth_date','image'];
        return view('Backend.Student.students(report).studentListWithPhoto',compact('columns','classes','sections','groups','years','categories'));
    }


    public function viewStudentListPhoto(Request $request){


        $class=$request->class;
        $group=$request->group;
        $section=$request->section;
        $category=$request->category;
        $academic_year=$request->academic_year;
        $school_code=$request->school_code;
        //dd($school_code);
        $col=$request->columns;


        $students=Student::where('school_code',$school_code)->where('action','approved')->where('class_name',$class)->where('group',$group)->where('section',$section)->where('category',$category)->where('year',$academic_year)->get();
        //dd($students);

        if (!isset($students)) {
            $students = [];
        }
        
        return view('Backend.Student.students(report).viewStudentList', compact('students','col'));
}

}
