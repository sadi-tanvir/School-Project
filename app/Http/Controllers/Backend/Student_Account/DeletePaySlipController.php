<?php

namespace App\Http\Controllers\Backend\Student_Account;

use App\Http\Controllers\Controller;
use App\Models\GeneratePayslip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeletePaySlipController extends Controller
{
    public function DeletePaySlipView(Request $request, $school_code)
    {
        return view("Backend.Student_accounts.DeletePaySlip", compact('school_code'));
    }

    public function GetPaySlipData(Request $request, $school_code)
    {
        $date_from = $request->query('date_from');
        $date_to = $request->query('date_to');
        $voucherNumber = $request->query('voucherNumber');

        if ($voucherNumber) {
            $pay_slips = GeneratePayslip::where('school_code', $school_code)
                ->where('voucher_number', '#' . $voucherNumber)
                ->select('voucher_number', 'student_id', 'class', 'group', 'collect_date', DB::raw('SUM(paid_amount) as total_paid'), DB::raw('SUM(amount) as total_amount'), DB::raw('SUM(waiver) as total_waiver'))
                ->groupBy('voucher_number', 'student_id', 'class', 'group', 'collect_date')
                ->get();

            return response()->json([
                'pay_slips' => $pay_slips
            ]);
        }

        if ($date_from && $date_to) {
            $pay_slips = GeneratePayslip::where('school_code', $school_code)
                ->whereBetween('collect_date', [$date_from, $date_to])
                ->select('voucher_number', 'student_id', 'class', 'group', 'collect_date', DB::raw('SUM(paid_amount) as total_paid'), DB::raw('SUM(amount) as total_amount'), DB::raw('SUM(waiver) as total_waiver'))
                ->groupBy('voucher_number', 'student_id', 'class', 'group', 'collect_date')
                ->get();

            return response()->json([
                'pay_slips' => $pay_slips
            ]);
        }
    }

    public function DeletePaySlipData(Request $request, $school_code)
    {
        $voucher_number = $request->query('selectedVouchers');
        return response()->json([
            'pay_slips' => $voucher_number
        ]);
    }
}
