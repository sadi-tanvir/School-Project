<?php

namespace App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddFees;
use App\Models\AddGroup;
use App\Models\AddPaySlip;
use App\Models\AddPaySlipType;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;

class AllPaySlipController extends Controller
{
    public function AllPaySlipView(Request $request, $school_code)
    {
        $classes = AddPaySlip::where("school_code", $school_code)
            ->where('action', 'approved')
            ->select('class_name')
            ->distinct()
            ->get();
        $groups = AddPaySlip::where("school_code", $school_code)
            ->where('action', 'approved')
            ->select('group_name')
            ->distinct()
            ->get();
        return view('Backend.BasicInfo.FeesSetting.ReportFeesSettings.AllPaySlip', compact('classes', 'groups', 'school_code'));
    }

    public function AllPaySlipPrint(Request $request, $school_code)
    {
        $class = $request->input('class');
        $group = $request->input('group');

        $schoolInfo = SchoolInfo::where('school_code', $school_code)->first();
        $paySlipTypes = AddPaySlipType::where('school_code', $school_code)->where('action', 'approved')->get();

        $allAmountOfpaySlips = [];
        foreach ($paySlipTypes as $key => $paySlipType) {
            $totalAmountOfpaySlips = AddPaySlip::where("school_code", $school_code)
                ->where('action', 'approved')
                ->where("class_name", $class)
                ->where("group_name", $group)
                ->where('pay_slip_type', $paySlipType->pay_slip_type_name)
                ->sum('fees_amount');

            $allAmountOfpaySlips[$paySlipType->pay_slip_type_name] = $totalAmountOfpaySlips;
        }

        // total amount
        $totalAmount = 0;
        foreach ($allAmountOfpaySlips as $key => $value) {
            $totalAmount = $totalAmount + $value;
        }

        $date = now();
        return view('Backend.BasicInfo.FeesSetting.ReportFeesSettings.AllPaySlipPrint', compact('schoolInfo', 'date', 'school_code', 'paySlipTypes', 'allAmountOfpaySlips', 'totalAmount', 'class'));
    }
}
