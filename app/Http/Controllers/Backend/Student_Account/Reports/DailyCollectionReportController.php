<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddPaySlip;
use App\Models\GeneratePayslip;
use App\Models\SchoolAdmin;
use App\Models\SchoolInfo;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailyCollectionReportController extends Controller
{
    public function DailyCollectionReport(Request $request, $school_code)
    {
        $schoolAdmins = SchoolAdmin::where('school_code', $school_code)->get();
        $classes = AddClass::where('school_code', $school_code)
            ->where('action', 'approved')
            ->get();
        return view('Backend/Student_accounts/Reports(Students_Fees)/dailyCollectionReport', compact('school_code', 'classes', 'schoolAdmins'));
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
        // sorting inputs
        $sortOrder = $request->session()->get('sortOrder', 'desc');
        $date_from = $request->session()->get('date_from', $request->input('date_from'));
        $date_to = $request->session()->get('date_to', $request->input('date_to'));
        $class = $request->session()->get('class', $request->input('class'));
        $student_roll = $request->session()->get('student_roll', $request->input('student_roll'));
        $entry_by = $request->session()->get('entry_by', $request->input('entry_by'));

        $entry_by_email = "";
        $entry_by_name = "";
        if ($entry_by != "Select" && $entry_by != null) {
            $entry_by_split = explode("_", $entry_by);
            $entry_by_email = $entry_by_split[0];
            $entry_by_name = $entry_by_split[1];
        }

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
            ->whereBetween('collect_date', [$date_from, $date_to])
            ->select('voucher_number', 'student_id', 'class', 'group', 'collected_by_name', 'collect_date', DB::raw('SUM(paid_amount) as total_paid'), DB::raw('SUM(amount) as total_amount'), DB::raw('SUM(waiver) as total_waiver'))
            ->groupBy('voucher_number', 'student_id', 'class', 'group', 'collected_by_name', 'collect_date')
            ->orderBy('collect_date', $sortOrder)
            ->get();

        // total paid amount
        $TotalAmount = GeneratePayslip::where('school_code', $school_code)
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
            ->whereBetween('collect_date', [$date_from, $date_to])
            ->sum('paid_amount');


        if (count($paySlipReport) > 0) {
            return view('Backend/Student_accounts/Reports(Students_Fees)/dailyCollectionReportPrint', compact('date_from', 'date_to', 'paySlipReport', 'entry_by_name', 'TotalAmount', 'sortOrder', 'class', 'student_roll', 'entry_by'));
        } else {
            return redirect()->back()->with('error', 'No data found');
        }
    }

    public function GetPaySlipReportSortingWise(Request $request, $school_code)
    {
        $sortOrder = $request->input('sortOrder');
        $date_to = $request->input('date_to');
        $date_from = $request->input('date_from');
        $class = $request->input('class');
        $student_roll = $request->input('student_roll');
        $entry_by = $request->input('entry_by');
        return redirect()->route('DailyCollectionReport.getReports', $school_code)->with([
            'sortOrder' => $sortOrder,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'class' => $class,
            'student_roll' => $student_roll,
            'entry_by' => $entry_by,
        ]);
    }


    // get all payslip details according to the voucher number
    public function GetPayslipDetailsReport(Request $request, $school_code, $voucherNumber)
    {
        $voucherWisePayslips = GeneratePayslip::where('school_code', $school_code)
            ->where('voucher_number', "#" . $voucherNumber)
            ->get();

        return view('Backend.Student_accounts.Reports(Students_Fees).dailyCollectionReportPayslipDetailsPrint', compact('voucherWisePayslips'));
    }


    // get all fees details according to the payslip Types
    public function GetFeesDetailsReport(Request $request, $school_code, $className, $payslipType)
    {
        $payslipWiseFees = AddPaySlip::where('school_code', $school_code)
            ->where('class_name', $className)
            ->where('pay_slip_type', $payslipType)
            ->get();

        return view('Backend.Student_accounts.Reports(Students_Fees).dailyCollectionReportFeesDetailsPrint', compact('payslipWiseFees'));
    }
}
