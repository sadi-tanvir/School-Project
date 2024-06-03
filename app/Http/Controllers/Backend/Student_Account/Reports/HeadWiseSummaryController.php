<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\GeneratePayslip;
use App\Models\Student;
use Illuminate\Http\Request;

class HeadWiseSummaryController extends Controller
{
    public function headwiseSummary(Request $request, $school_code)
    {
        $classes = AddClass::where('school_code', $school_code)
            ->where('action', 'approved')
            ->get();

        $payslipTypes = GeneratePayslip::where('school_code', $school_code)
            ->where('action', 'approved')
            ->select('pay_slip_type')
            ->distinct()
            ->get();

        return view('Backend/Student_accounts/Reports(Students_Fees)/headwiseSummary', compact('school_code', 'classes', 'payslipTypes'));
    }

    public function GetStudentRoll(Request $request, $school_code)
    {
        $class = $request->query('class_name');

        $student_info = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('Class_name', $class)
            ->select('student_roll', 'name', 'student_id')
            ->get();

        return response()->json([
            "student_info" => $student_info,
        ]);
    }
}
