<?php

namespace App\Http\Controllers\Backend\FeesSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddFees;
use App\Models\AddFeeType;
use App\Models\AddGroup;
use Illuminate\Http\Request;

class FeesSetupController extends Controller
{
    public function FeesSetupView(Request $request, $school_code)
    {
        $fessTypes = $request->session()->get('feesTypeData');
        $classTo = $request->session()->get('class_to');
        $classFrom = $request->session()->get('class_from');
        $groupName = $request->session()->get('group');

        $classes = AddClass::where("school_code", $school_code)->where('action', 'approved')->get();
        $groups = AddGroup::where("school_code", $school_code)->where('action', 'approved')->get();
        $selectedFees = AddFees::where("school_code", $school_code)
            ->where('action', 'approved')
            ->where('group_name', $groupName)
            ->where('class_name', $classFrom)
            ->select("fee_type", "fee_amount")
            ->get();

        $existingFeesInfo = [];

        foreach ($selectedFees as $key => $fee) {
            $existingFeesInfo[$fee->fee_type] = $fee->fee_amount;
        }

        return view('Backend.BasicInfo.FeesSetting.FeesSetup', compact('classes', 'groups', 'school_code', 'fessTypes', 'classTo', 'classFrom', 'groupName', 'existingFeesInfo'));
    }

    public function ViewFeeTypesData(Request $request, $school_code)
    {
        if ($request->class_to == "Select" || $request->class_from == "Select") {
            return back()->withError('Please select class');
        } else {
            $fees_types = AddFeeType::where("school_code", $school_code)
                ->where('action', 'approved')
                ->get();
            $class_to = $request->class_to;
            $class_from = $request->class_from;
            $group = $request->group;
            return redirect()->route('feesSetup.view', $school_code)->with([
                'feesTypeData' => $fees_types,
                'class_to' => $class_to,
                'class_from' => $class_from,
                'group' => $group,
            ]);

        }
    }

    public function add_fees_setup(Request $request, $school_code)
    {
        $feeTypesAndFeeAmount = array_combine($request->fee_type, $request->fee_amount);
        foreach ($feeTypesAndFeeAmount as $fee_type => $fee_amount) {
            AddFees::updateOrCreate(
                [
                    'school_code' => $school_code,
                    'class_name' => $request->class_to,
                    'group_name' => $request->group,
                    'fee_type' => $fee_type,
                ],
                [
                    'fee_amount' => $fee_amount,
                ]
            );
        }

        return back()->withSuccess('Fees Setup successful');
    }
}
