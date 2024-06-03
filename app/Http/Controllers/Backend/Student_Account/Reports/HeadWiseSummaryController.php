<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\GeneratePayslip;
use App\Models\SchoolAdmin;
use App\Models\SchoolInfo;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeadWiseSummaryController extends Controller
{
    public function headwiseSummary(Request $request, $school_code)
    {
        $schoolAdmins = SchoolAdmin::where('school_code', $school_code)->get();

        $classes = AddClass::where('school_code', $school_code)
            ->where('action', 'approved')
            ->get();

        $payslipTypes = GeneratePayslip::where('school_code', $school_code)
            ->where('action', 'approved')
            ->select('pay_slip_type')
            ->distinct()
            ->get();

        return view('Backend/Student_accounts/Reports(Students_Fees)/headwiseSummary', compact('school_code', 'classes', 'payslipTypes', 'schoolAdmins'));
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


    public function GetPaySlipReport(Request $request, $school_code)
    {
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');
        $class = $request->input('class');
        $student_roll = $request->input('student_roll');
        $payslipType = $request->input('payslipType');
        $entry_by = $request->input('entry_by');
        $entry_by_email = "";
        $entry_by_name = "";
        if ($entry_by != "Select") {
            $entry_by_split = explode("_", $entry_by);
            $entry_by_email = $entry_by_split[0];
            $entry_by_name = $entry_by_split[1];
        }
        // dd($entry_by);

        $paySlipReport = GeneratePayslip::where('school_code', $school_code)
            ->where('action', 'approved')
            ->when($class !== "Select", function ($query) use ($class) {
                return $query->where('class', $class);
            })
            ->when($student_roll !== null, function ($query) use ($student_roll) {
                return $query->where('student_id', $student_roll);
            })
            ->when($entry_by !== "Select", function ($query) use ($entry_by_email) {
                return $query->where('collected_by_email', $entry_by_email);
            })
            ->when($payslipType !== "Select", function ($query) use ($payslipType) {
                return $query->where('pay_slip_type', $payslipType);
            })
            ->whereBetween('collect_date', [$date_from, $date_to])
            ->select('pay_slip_type', DB::raw('SUM(paid_amount) as total_payable_amount'))
            ->groupBy('pay_slip_type')
            ->get();

        $totalAmount = 0;
        foreach ($paySlipReport as $slip) {
            $totalAmount += $slip->total_payable_amount;
        }

        $schoolInfo = SchoolInfo::where('school_code', $school_code)->first();

        return view('Backend/Student_accounts/Reports(Students_Fees)/headWiseSummaryReportPrint', compact('schoolInfo', 'date_from', 'date_to', 'paySlipReport', 'entry_by_name', 'totalAmount'));
    }

}
