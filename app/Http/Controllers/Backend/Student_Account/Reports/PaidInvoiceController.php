<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use App\Models\GeneratePayslip;
use App\Models\Student;
use Illuminate\Http\Request;

class PaidInvoiceController extends Controller
{
    public function paidInvoice()
    {
        return view('Backend/Student_accounts/Reports(Students_Fees)/paidInvoice');
    }


    public function PrintInvoiceWithVoucherId(Request $request, $school_code)
    {
        $payslipInfo = GeneratePayslip::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('voucher_number', $request->input('voucher_id'))
            ->get();

        $totalAmount = $payslipInfo->sum('amount');
        $totalPaidAmount = $payslipInfo->sum('paid_amount');
        $totalWaiverAmount = $payslipInfo->sum('waiver');
        $totalDueAmount = $payslipInfo->sum('due_amount');

        // get student info
        $studentInfo = Student::where('school_code', $school_code)
            ->where('student_id', $payslipInfo[0]->student_id)
            ->select('student_roll', 'student_id', 'name', 'section', 'group', 'Class_name', 'year')
            ->first();

        // dd($studentInfo);

        return view('Backend/Student_accounts/Reports(Students_Fees)/paidInvoicePrint', compact('payslipInfo', 'studentInfo', 'totalAmount', 'totalPaidAmount', 'totalWaiverAmount', 'totalDueAmount'));
    }
}
