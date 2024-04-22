<?php

namespace App\Http\Controllers\Backend\ExamResult;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\Student;
use Illuminate\Http\Request;

class ExamProcessController extends Controller
{
    public function exam_process($school_code)
    {
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        return view('/Backend/ExamResult/exam_process', compact('classData', 'groupData', 'sectionData', 'classExamData', 'academicYearData'));
    }

    public function getStudents(Request $request, $schoolCode,$classValue,$groupValue,$sectionValue)
    {
        // $class_name = $request->input('class');
        // $group_name = $request->input('group');
        // $section_name = $request->input('section');
    
        // Fetch students based on the selected class, group, and section
        $students = Student::where('class_name', $classValue)
            ->where('group', $groupValue)
            ->where('section', $sectionValue)
            ->where('school_code', $schoolCode)
            ->pluck('student_roll', 'student_roll');
    
        // You may return the students as JSON response or in any suitable format
        return response()->json($students);
    }
    
}
