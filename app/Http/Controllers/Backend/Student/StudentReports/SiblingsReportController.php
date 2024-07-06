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
        $stu_ids = $request->input('stu_ids'); // Array of student IDs
        $father_mobile = ''; // Father's mobile number
    
        // Fetch students with the given IDs and school code
        $students = Student::whereIn('student_id', $stu_ids)
                            ->where('school_code', $school_code)
                            ->get();
  
        // Check if all provided students have the same father's mobile number
        $allMatch = $students->every(function ($student) use ($father_mobile) {
            return $student->father_mobile === $father_mobile;
        });
        dd($allMatch);
    
        if ($allMatch) {
            // All students have the same father's mobile number
            return redirect()->back()->with('success', 'Father\'s mobile number matches all provided students.');
        } else {
            // Not all students have the same father's mobile number
            return redirect()->back()->with('error', 'No data found');
        }
       
    }

}
