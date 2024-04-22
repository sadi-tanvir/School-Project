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

class addShortListController extends Controller
{
  
    public function studentShortList($school_code){

        $students=null;
        $columns=['name', 'birth_date','student_id','student_role','Class_name','group','section','shift','category','year','religious','mobile_no','father_name', 'father_birth_date','mother_name','mother_nid','addmission_date','blood_group'];
        $classes=AddClass::where('school_code',$school_code)->where('action','approved')->get();
        $sections=AddSection::where('school_code',$school_code)->where('action','approved')->get();
        $groups=AddGroup::where('school_code',$school_code)->where('action','approved')->get();
        $categories=AddCategory::where('school_code',$school_code)->where('action','approved')->get();
        $years=AddAcademicYear::where('school_code',$school_code)->where('action','approved')->get();
        return view('Backend.Student.students(report).studentShortList', compact('students','columns','classes','sections','groups','categories','years'));
    }

    public function viewStudentShortList(Request $request){
        // dd($request);
        if(!$request->class){
            return redirect()->back()->with('error', 'please Select a class name');
        }
        if(!$request->group){
            return redirect()->back()->with('error', 'please Select a group name');
        }
        if(!$request->section){
            return redirect()->back()->with('error', 'please Select a section name');
        }
        if(!$request->category){
            return redirect()->back()->with('error', 'please Select a category name');
        }
        if(!$request->academic_year){
            return redirect()->back()->with('error', 'please Select a academic year');
        }

        $class=$request->class;
        $group=$request->group;
        $section=$request->section;
        $category=$request->category;
        $academic_year=$request->academic_year;
        $school_code=$request->school_code;
        $col=$request->columns;


        $students=Student::where('school_code',$school_code)->where('action','approved')->where('class_name',$class)->where('group',$group)->where('section',$section)->where('category',$category)->where('year',$academic_year)->get();
         //dd($students);

        if (!isset($students)) {
            $students = [];
        }
        $columns=['name', 'birth_date','student_id','student_role','Class_name','group','section','shift','category','year','religious','mobile_no','father_name', 'father_birth_date','mother_name','mother_nid','addmission_date','blood_group'];
        $classes=AddClass::where('school_code',$school_code)->where('action','approved')->get();
        $sections=AddSection::where('school_code',$school_code)->where('action','approved')->get();
        $groups=AddGroup::where('school_code',$school_code)->where('action','approved')->get();
        $categories=AddCategory::where('school_code',$school_code)->where('action','approved')->get();
        $years=AddAcademicYear::where('school_code',$school_code)->where('action','approved')->get();
        return view('Backend.Student.students(report).studentShortList', compact('students','col','classes','sections','groups','categories','years','columns'));
    }

    public function downloadShortList(Request $request){
        return view('BAckend.Student.students(report).downloadShortList');
    }
}
