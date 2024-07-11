<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClass;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\SchoolInfo;
use App\Models\Student;
use Illuminate\Http\Request;

class addShortListController extends Controller
{

    public function studentShortList($school_code)
    {

        $students = null;
        $columns = ['name', 'birth_date', 'student_id', 'student_roll', 'Class_name', 'group', 'section', 'shift', 'category', 'year', 'religious', 'mobile_no', 'father_name', 'father_birth_date', 'mother_name', 'mother_nid', 'addmission_date', 'blood_group'];
        $classes = AddClass::where('school_code', $school_code)->where('action', 'approved')->get();
        $sections = AddSection::where('school_code', $school_code)->where('action', 'approved')->get();
        $groups = AddGroup::where('school_code', $school_code)->where('action', 'approved')->get();
        $categories = AddCategory::where('school_code', $school_code)->where('action', 'approved')->get();
        $years = AddAcademicYear::where('school_code', $school_code)->where('action', 'approved')->get();
        return view('Backend.Student.students(report).studentShortList', compact('students', 'columns', 'classes', 'sections', 'groups', 'categories', 'years'));
    }

    public function viewStudentShortList(Request $request)
    {
        $class = $request->class;
        $group = $request->group;
        $section = $request->section;
        $category = $request->category;
        $academic_year = $request->academic_year;
        $gender = $request->gender;

        $school_code = $request->school_code;
        $col = $request->columns;
    
        // Base query
        $studentQuery = Student::where('school_code', $school_code)->where('action', 'approved');
    
        if ($class) {
            $studentQuery->where('Class_name', $class);
        }
    
        if ($group) {
            $studentQuery->where('group', $group);
        }
    
        if ($section) {
            $studentQuery->where('section', $section);
        }
    
        if ($category) {
            $studentQuery->where('category', $category);
        }
    
        if ($academic_year) {
            $studentQuery->where('year', $academic_year);
        }
        if ($gender) {
            $studentQuery->where('gender', $gender);
        }
    
        $students = $studentQuery->get();
    
        if (!isset($students)) {
            $students = [];
        }
    
        $school_info = SchoolInfo::where('school_code', $school_code)->first();
        $date = date('d-m-Y');
        $columns = ['name', 'birth_date', 'student_id', 'student_role', 'class_name', 'group', 'section', 'shift', 'category', 'year', 'religious', 'mobile_no', 'father_name', 'father_birth_date', 'mother_name', 'mother_nid', 'admission_date', 'blood_group'];
        $classes = AddClass::where('school_code', $school_code)->where('action', 'approved')->get();
        $sections = AddSection::where('school_code', $school_code)->where('action', 'approved')->get();
        $groups = AddGroup::where('school_code', $school_code)->where('action', 'approved')->get();
        $categories = AddCategory::where('school_code', $school_code)->where('action', 'approved')->get();
        $years = AddAcademicYear::where('school_code', $school_code)->where('action', 'approved')->get();
    
        // Return view with compacted data
        return view('Backend.Student.students(report).studentShortList', compact('school_info', 'date', 'students', 'col', 'classes', 'sections', 'groups', 'categories', 'years', 'columns'));
    }

    public function downloadShortList(Request $request)
    {
        return view('BAckend.Student.students(report).downloadShortList');
    }
}