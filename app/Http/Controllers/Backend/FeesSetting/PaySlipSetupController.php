<?php

namespace App\Http\Controllers\Backend\FeesSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddFees;
use App\Models\AddFeeType;
use App\Models\AddGroup;
use App\Models\AddPaySlip;
use App\Models\AddPaySlipType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaySlipSetupController extends Controller
{
    public function PaySlipSetupView(Request $request, $school_code)
    {
        $classes = AddClass::where("school_code", $school_code)->where('action', 'approved')->get();
        $groups = AddGroup::where("school_code", $school_code)->where('action', 'approved')->get();
        $paySlipTypes = AddPaySlipType::where("school_code", $school_code)->where('action', 'approved')->get();
        $feesTypes = $request->session()->get('FeesTypesSession');
        $TotalPaySlipAmount = $request->session()->get('TotalPaySlipAmountSession');
        $fees_amounts = $request->session()->get('fees_amountsSession');
        $PaySlipData = $request->session()->get('PaySlipDataSession');
        $paySlipTypeName = $request->session()->get('paySlipTypeSession');
        $classTo = $request->session()->get('classToSession');
        $classFrom = $request->session()->get('classFromSession');
        $groupName = $request->session()->get('groupSession');

        return view('Backend.BasicInfo.FeesSetting.PaySlipSetup', compact('classes', 'groups', 'paySlipTypes', 'school_code', 'PaySlipData', 'paySlipTypeName', 'classTo', 'classFrom', 'groupName', 'feesTypes', 'fees_amounts', 'TotalPaySlipAmount'));
    }


    public function PaySlipSetupGetData(Request $request, $school_code)
    {
        // dd($request->all());
        if ($request->class_to == "Select" || $request->class_from == "Select" || $request->pay_slip_type == "Select") {
            return back()->withError('Please select class, group and pay-slip-type Fields');
        } else {
            $classTo = $request->class_to;
            $classFrom = $request->class_from;
            $group = $request->group;
            $pay_slip_type = $request->pay_slip_type;

            $fees_types = AddFeeType::where("school_code", $school_code)
                ->where('action', 'approved')
                ->get();

            $fees_amounts = AddFees::where("school_code", $school_code)
                ->where('action', 'approved')
                ->where('class_name', $classFrom)
                ->where('group_name', $group)
                ->pluck('fee_amount', 'fee_type')
                ->toArray();


            $PaySlipData = AddPaySlip::where("school_code", $school_code)
                ->where('action', 'approved')
                ->where('class_name', $classFrom)
                ->where('group_name', $group)
                ->where('pay_slip_type', $pay_slip_type)
                ->pluck('fees_amount', 'fee_type_name')
                ->toArray();

            $TotalPaySlipAmount = AddPaySlip::where("school_code", $school_code)
                ->where('action', 'approved')
                ->where('class_name', $classFrom)
                ->where('group_name', $group)
                ->where('pay_slip_type', $pay_slip_type)
                ->sum('fees_amount');


            return redirect()->route('paySlipSetup.view', $school_code)->with([
                'PaySlipDataSession' => $PaySlipData,
                'TotalPaySlipAmountSession' => $TotalPaySlipAmount,
                'fees_amountsSession' => $fees_amounts,
                'FeesTypesSession' => $fees_types,
                'paySlipTypeSession' => $pay_slip_type,
                'classToSession' => $classTo,
                'classFromSession' => $classFrom,
                'groupSession' => $group,
            ]);
        }
    }


    public function StorePaySlipSetup(Request $request, $school_code)
    {
        $class = $request->fees_data_class;
        $group = $request->fees_data_group;
        $pay_slip_type = $request->pay_slip_type_name;

        $fee_type_names = $request->input('fee_type_name', []);
        $fee_amounts = $request->input('fee_amount', []);
        $statuses = $request->input('status', []);


        foreach ($fee_type_names as $key => $fee_type_name) {
            if (isset($statuses[$fee_type_name])) {
                AddPaySlip::updateOrCreate(
                    [
                        'school_code' => $school_code,
                        'class_name' => $class,
                        'group_name' => $group,
                        'pay_slip_type' => $pay_slip_type,
                        'fee_type_name' => $fee_type_name,
                    ],
                    [
                        'fees_amount' => $fee_amounts[$fee_type_name],
                        'status' => isset($statuses[$fee_type_name]) ? 'active' : 'inactive'
                    ]
                );
            } else {
                $test = AddPaySlip::where("school_code", $school_code)
                    ->where('action', 'approved')
                    ->where('class_name', $class)
                    ->where('group_name', $group)
                    ->where('pay_slip_type', $pay_slip_type)
                    ->where('fee_type_name', $fee_type_name)
                    ->first();
                if ($test) {
                    $test->delete();
                }
                // dump($test);
            }
        }

        return redirect()->back()->with('success', 'Pay slip setup successful');
    }
}
