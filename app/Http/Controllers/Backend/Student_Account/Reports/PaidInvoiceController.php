<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use App\Models\GeneratePayslip;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaidInvoiceController extends Controller
{
    public function paidInvoice()
    {
        return view('Backend/Student_accounts/Reports(Students_Fees)/paidInvoice');
    }


    public function PrintInvoiceWithVoucherId(Request $request, $school_code)
    {
        $voucher_number = $request->input('voucher_id', $request->voucher_id);

        if ($voucher_number === null)
            return redirect()->back()->with('error', 'Please enter voucher id');

        $payslipInfo = GeneratePayslip::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('voucher_number', '#' . str_replace('#', '', $voucher_number))
            ->get();

        // throw error message if no data found
        if ($payslipInfo->isEmpty()) {
            return redirect()->back()->with('error', 'No data found with this voucher id');
        }

        $totalAmount = $payslipInfo->sum('amount');
        $totalPaidAmount = $payslipInfo->sum('paid_amount');
        $totalWaiverAmount = $payslipInfo->sum('waiver');
        $totalDueAmount = $payslipInfo->sum('due_amount');

        // get student info
        $studentInfo = Student::where('school_code', $school_code)
            ->where('student_id', $payslipInfo[0]->student_id)
            ->select('student_roll', 'student_id', 'name', 'section', 'group', 'Class_name', 'year')
            ->first();

        return view('Backend/Student_accounts/Reports(Students_Fees)/paidInvoicePrint', compact('payslipInfo', 'studentInfo', 'totalAmount', 'totalPaidAmount', 'totalWaiverAmount', 'totalDueAmount'));
    }

    public function PrintInvoiceWithCollectDate(Request $request, $school_code)
    {
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');
        if ($date_from === null || $date_to === null)
            return redirect()->back()->with('error', 'Please enter date range');
        // dd($collect_date);

        $payslips = GeneratePayslip::where('school_code', $school_code)
            ->whereBetween('collect_date', [$date_from, $date_to])
            ->select('voucher_number', 'student_id', 'class', 'group', 'collect_date', DB::raw('SUM(paid_amount) as total_paid'), DB::raw('SUM(amount) as total_amount'), DB::raw('SUM(waiver) as total_waiver'))
            ->groupBy('voucher_number', 'student_id', 'class', 'group', 'collect_date')
            ->get();

        // throw error message if no data found
        if ($payslips->isEmpty()) {
            return redirect()->back()->with('error', 'No data found with this date range');
        }

        return view('Backend/Student_accounts/Reports(Students_Fees)/paidInvoiceListPrint', compact('payslips'));
    }

    public function PrintInvoiceWithStudentId(Request $request, $school_code)
    {
        $student_id = $request->input('student_id');
        if ($student_id === null)
            return redirect()->back()->with('error', 'Please enter student id');
        // dd($collect_date);

        $payslips = GeneratePayslip::where('school_code', $school_code)
            ->where('student_id', $student_id)
            ->where('payment_status', 'paid')
            ->select('voucher_number', 'class', 'student_id', 'group', 'collect_date', DB::raw('SUM(paid_amount) as total_paid'), DB::raw('SUM(amount) as total_amount'), DB::raw('SUM(waiver) as total_waiver'))
            ->groupBy('voucher_number', 'class', 'student_id', 'group', 'collect_date')
            ->get();

            // dd($payslips);

        // throw error message if no data found
        if ($payslips->isEmpty()) {
            return redirect()->back()->with('error', 'No data found with this date range');
        }

        return view('Backend/Student_accounts/Reports(Students_Fees)/paidInvoiceListPrint', compact('payslips'));
    }
}
