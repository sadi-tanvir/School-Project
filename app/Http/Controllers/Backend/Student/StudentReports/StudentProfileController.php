<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\GeneratePayslip;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    //
    public function student_profileInfo($school_code)
    {
        $classes = AddClass::where("action", "approved")->where("school_code", $school_code)->get();
        $year = AddAcademicYear::where("action", "approved")->where("school_code", $school_code)->get();
        return view('Backend.Student.students(report).studentProfileInfo', compact('classes', 'year'));
    }

    public function studentid(Request $request, $school_code)
    {
        $class = $request->class;

        $student = Student::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($student);
    }

    public function student_ProfileReport(Request $request, $school_code)
    {
        $class = $request->class;
        $id = $request->id;
        $year = $request->year;
        $student = Student::where('class_name', $class)->where('school_code', $school_code)->where('student_id', $id)->where('year', $year)->get();
        $payslips = GeneratePayslip::where('school_code', $school_code)->where('student_id', $id)->get();
        $totalAmount = $payslips->sum('amount');
        $totalReceived = $payslips->sum('paid_amount');
        $totalWaiver = $payslips->sum('waiver');
        $totalDue = $payslips->sum('payable');
        return view('Backend.Student.students(report).studentProfile', compact('student', 'payslips'));

    }

    public function search(Request $request, $school_code)
    {

        $id = $request->input('id');

        if ($id) {
            $student = Student::where('school_code', $school_code)->where('student_id', $id)->get();
            $payslips = GeneratePayslip::where('school_code', $school_code)->where('student_id', $id)->get();
            $totalAmount = $payslips->sum('amount');
            $totalReceived = $payslips->sum('paid_amount');
            $totalWaiver = $payslips->sum('waiver');
            $totalDue = $payslips->sum('payable');
            if ($student) {
                return view('Backend.Student.students(report).studentProfile', compact('student', 'payslips', 'totalAmount', 'totalReceived', 'totalWaiver', 'totalDue'));
            } else {
                return redirect()->back()->with('error', 'Student not found!');
            }
        } else {
            return redirect()->back()->with('error', 'Please provide a valid ID.');
        }
    }
}
