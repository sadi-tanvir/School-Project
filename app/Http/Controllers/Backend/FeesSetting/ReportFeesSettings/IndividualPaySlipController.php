<?php

namespace App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddPaySlip;
use App\Models\AddPaySlipType;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;

class IndividualPaySlipController extends Controller
{
    public function IndividualPaySlipView(Request $request, $school_code)
    {
        // $classes = AddClass::where("school_code", $school_code)->where('action', 'approved')->get();
        $classes = AddPaySlip::where("school_code", $school_code)
            ->where('action', 'approved')
            ->select('class_name')
            ->distinct()
            ->get();
        $paySlipTypes = AddPaySlip::where("school_code", $school_code)
            ->where('action', 'approved')
            ->select('pay_slip_type')
            ->distinct()
            ->get();
        return view('Backend.BasicInfo.FeesSetting.ReportFeesSettings.IndividualPaySlip', compact("classes", "paySlipTypes"));
    }


    public function PrintIndividualPaySlip(Request $request, $school_code)
    {
        $class = $request->input('class_name');
        $pay_slip_type = $request->input('pay_slip_type_name');

        $date = now();
        $schoolInfo = SchoolInfo::where('school_code', $school_code)->first();
        $individualPaySlipsData = AddPaySlip::where("school_code", $school_code)
            ->where('action', 'approved')
            ->where("class_name", $class)
            ->where('pay_slip_type', $pay_slip_type)
            ->get();
        $TotalAmount = AddPaySlip::where("school_code", $school_code)
            ->where('action', 'approved')
            ->where("class_name", $class)
            ->where('pay_slip_type', $pay_slip_type)
            ->sum("fees_amount");

        if (count($individualPaySlipsData) === 0) {
            return redirect()->back()->with("error", "No data found. Please add fees data first by going to \"Fees-setting/Pay Slip Setup\"");
        } else {
            return view('Backend.BasicInfo.FeesSetting.ReportFeesSettings.IndividualPaySlipPrint', compact('schoolInfo', 'date', 'school_code', 'individualPaySlipsData', 'class', 'pay_slip_type', 'TotalAmount'));
        }
    }
}
