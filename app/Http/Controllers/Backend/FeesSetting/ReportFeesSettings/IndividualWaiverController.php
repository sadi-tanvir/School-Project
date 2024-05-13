<?php

namespace App\Http\Controllers\Backend\FeesSetting\ReportFeesSettings;

use App\Http\Controllers\Controller;
use App\Models\SchoolInfo;
use App\Models\Waiver;
use Illuminate\Http\Request;

class IndividualWaiverController extends Controller
{
    public function IndividualWaiverView(Request $request, $school_code)
    {
        $individualPaySlipsData = Waiver::where("waivers.schoolCode", $school_code)
            ->where('waivers.action', 'approved')
            // ->join('add_fees', 'fee_id', '=', 'add_fees.id')
            ->join('students', 'waivers.student_id', '=', 'students.id')
            ->select('waivers.*', 'students.Class_name', 'students.nedubd_student_id', 'students.id', 'students.name')
            ->get();

        $classes = [];
        $students_id = [];
        $waiver_types = [];
        foreach ($individualPaySlipsData as $key => $paySlip) {
            if (!in_array($paySlip->Class_name, $classes)) {
                $classes[] = $paySlip->Class_name;
            }
            if (!in_array($paySlip->student_id, $students_id)) {
                $custom = $paySlip->nedubd_student_id . ' - ' . $paySlip->name;
                $students_id[$paySlip->student_id] = $custom;
            }
            if (!in_array($paySlip->waiver_type_name, $waiver_types)) {
                $waiver_types[] = $paySlip->waiver_type_name;
            }
        }

        return view('Backend.BasicInfo.FeesSetting.ReportFeesSettings.IndividualWaiver', compact('classes', 'students_id', 'waiver_types', 'school_code'));
    }

    public function GetDataIndividualWaiver(Request $request, $school_code)
    {
        $class = $request->input('class');
        $waiver_type = $request->input('waiver_type');
        $student_id = $request->input('student_id');

        // validation checking
        if (!$class || !$waiver_type || !$student_id) {
            return redirect()->back()->with('error', 'Please select all fields');
        }

        $individualPaySlipsData = Waiver::where("waivers.schoolCode", $school_code)
            ->where('waivers.action', 'approved')
            ->join('students', 'waivers.student_id', '=', 'students.id')
            ->select('students.Class_name', 'students.nedubd_student_id', 'students.id', 'students.name')
            ->pluck('students.id', 'students.nedubd_student_id')
            ->toArray();
        // $student_id = $parts = explode(" - ", $student_id)[0];
        $student_id = explode(" - ", $student_id)[0];


        $individualWaiverData = Waiver::where("waivers.schoolCode", $school_code)
            ->where('waivers.action', 'approved')
            ->join('add_fees', 'fee_id', '=', 'add_fees.id')
            ->join('students', 'waivers.student_id', '=', 'students.id')
            ->select('waivers.*', 'students.name', 'students.nedubd_student_id', 'add_fees.fee_amount', 'add_fees.fee_type')
            ->where('students.Class_name', $class)
            ->where('waivers.student_id', $individualPaySlipsData[$student_id])
            ->where('waivers.waiver_type_name', $waiver_type)
            ->get();

        // dd($individualWaiverData);

        if (count($individualWaiverData) == 0) {
            return redirect()->back()->with('error', 'No data found');
        }
        ;

        $totalFeeAmount = 0;
        $totalDiscount = 0;
        foreach ($individualWaiverData as $key => $waiver) {
            $totalFeeAmount += intval($waiver->fee_amount);
            $totalDiscount += $waiver->waiver_amount;
        }

        $schoolInfo = SchoolInfo::where('school_code', $school_code)->first();
        $date = now();
        return view('Backend.BasicInfo.FeesSetting.ReportFeesSettings.IndividualWaiverPrint', compact('schoolInfo', 'date', 'individualWaiverData', 'totalFeeAmount', 'totalDiscount'));
    }
}
