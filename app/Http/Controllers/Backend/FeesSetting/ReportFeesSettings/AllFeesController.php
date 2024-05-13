<?php

namespace App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddFees;
use App\Models\AddFeeType;
use App\Models\AddGroup;
use Illuminate\Http\Request;

class AllFeesController extends Controller
{
    public function AllFeesView(Request $request, $school_code)
    {
        // $classes = AddClass::where("school_code", $school_code)->where('action', 'approved')->get();
        // $groups = AddGroup::where("school_code", $school_code)->where('action', 'approved')->get();
        $classes = AddFees::where("school_code", $school_code)
            ->where('action', 'approved')
            ->select('class_name')
            ->distinct()
            ->get();
        $groups = AddFees::where("school_code", $school_code)
            ->where('action', 'approved')
            ->select('group_name')
            ->distinct()
            ->get();
        // dump($AllFess);
        return view('Backend.BasicInfo.FeesSetting.ReportFeesSettings.AllFees', compact('classes', 'groups', 'school_code'));
    }

    public function GetAllFeesReportData(Request $request, $school_code)
    {
        $class = $request->input("class");
        $group = $request->input("group");

        // $FeeTypes = AddFeeType::where("school_code", $school_code)->where('action', 'approved')->get();
        $feesData = AddFees::where("school_code", $school_code)->where('action', 'approved')->where("class_name", $class)->where("group_name", $group)->get();

        if (count($feesData) == 0) {
            return redirect()->back()->with("error", "No data found. Please add fees data first by going to \"Fees-setting/fees setup\"");
        } else {
            $totalAmount = 0;
            foreach ($feesData as $key => $value) {
                $totalAmount = $totalAmount + $value->fee_amount;
            }

            return view("Backend.BasicInfo.FeesSetting.ReportFeesSettings.AllFeesPrint", compact("class", "group", "school_code", 'feesData', 'totalAmount'));
        }
    }
}
