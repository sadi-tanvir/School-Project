<?php

namespace App\Http\Controllers\Backend\STudent\StudentReports;

use App\Http\Controllers\Controller;
use App\Models\SchoolInfo;
use App\Models\Student;
use Illuminate\Http\Request;

class SiblingsReportController extends Controller
{
    public function siblings(Request $request, $school_code)
    {
        return view('Backend.Student.students(report).siblingsReport');
    }

    public function fatherMatch(Request $request, $school_code)
    {
        $father_name = $request->father_name;
        $father_mobile = $request->father_mobile;
        $data = Student::where('school_code', $school_code)->where('father_mobile', $father_mobile)->exists();
        $school_info = SchoolInfo::where('school_code', $school_code)->first();
        $date = Date('d-m-Y');
        if ($data) {
            $data = Student::where('school_code', $school_code)->where('father_mobile', $father_mobile)->get();
        return view('Backend.Student.students(report).detailsSiblingReport', compact('data','school_info','date'));
           
        }
        return redirect()->back()->with('error', 'No data found');
    }
    public function motherMatch(Request $request, $school_code)
    {
        $mother_name = $request->mother_name;
        $mother_mobile = $request->mother_mobile;
        $data = Student::where('school_code', $school_code)->where('mother_number', $mother_mobile)->exists();
        $school_info = SchoolInfo::where('school_code', $school_code)->first();
        $date = Date('d-m-Y');
        if ($data) {
            $data = Student::where('school_code', $school_code)->where('mother_number', $mother_mobile)->get();
        return view('Backend.Student.students(report).detailsSiblingReport', compact('data','school_info','date'));
           
        }
        return redirect()->back()->with('error', 'No data found');
    }

    public function findStudent(Request $request, $school_code)
    {
        $studentId = $request->studentId;
        $data = Student::where('school_code', $school_code)->where('student_id', $studentId)->exists();
        $school_info = SchoolInfo::where('school_code', $school_code)->first();
        $date = Date('d-m-Y');
        if ($data) {
            $data = Student::where('school_code', $school_code)->where('student_id', $studentId)->get();
        return view('Backend.Student.students(report).detailsSiblingReport', compact('data','school_info','date'));
           
        }
        return redirect()->back()->with('error', 'No data found');
    }

  

    public function studentMatch(Request $request, $school_code)
{
    $stu_ids = $request->input('stu_ids'); 
  
    // Fetch students with the given IDs and school code
    $students = Student::whereIn('student_id', $stu_ids)
                        ->where('school_code', $school_code)
                        ->get();
    
    // If no students are found, return an error
    if ($students->isEmpty()) {
        return redirect()->back()->with('error', 'No students found');
    }

    // Set the father's mobile number to the first student's father's mobile number
    $father_mobile = $students->first()->father_mobile;
 
    // Check if all provided students have the same father's mobile number
    $allMatch = $students->every(function ($student) use ($father_mobile) {
        return $student->father_mobile === $father_mobile;
    });
  
    if ($allMatch) {
        $school_info = SchoolInfo::where('school_code', $school_code)->first();
        $date = Date('d-m-Y');
        $data = Student::whereIn('student_id', $stu_ids)
        ->where('school_code', $school_code)
        ->get();
        return view('Backend.Student.students(report).detailsSiblingReport', compact('data','school_info','date'));
    } else {
       
        return redirect()->back()->with('error', 'No data match.');
    }
}


}
