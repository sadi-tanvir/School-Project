<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use App\Models\SchoolInfo;
use App\Models\Waiver;
use Illuminate\Http\Request;

class ListOfSepecialDiscountController extends Controller
{
    public function listOfSpecialDiscount(Request $request, $school_code)
    {
        $waiverData = Waiver::where("waivers.schoolCode", $school_code)
            ->where('waivers.action', 'approved')
            ->join('students', 'waivers.student_id', '=', 'students.id')
            ->select('waivers.*', 'students.Class_name', 'students.student_id', 'students.id', 'students.name')
            ->get();

        $classes = [];

        foreach ($waiverData as $key => $paySlip) {
            if (!in_array($paySlip->Class_name, $classes)) {
                $classes[] = $paySlip->Class_name;
            }
        }

        return view('Backend/Student_accounts/Reports(Students_Fees)/listOfSpecialDiscount', compact('classes'));
    }


    public function GetStudentInformation(Request $request, $school_code)
    {
        $className = $request->query('class_name');
        $waiverData = Waiver::where("waivers.schoolCode", $school_code)
            ->where('waivers.action', 'approved')
            ->where('students.Class_name', $className)
            ->join('students', function ($join) use ($school_code, $className) {
                $join->on('waivers.student_id', '=', 'students.id')
                    ->where('students.school_code', '=', $school_code)
                    ->where('students.Class_name', '=', $className);
            })
            ->select('waivers.*', 'students.student_roll', 'students.student_id', 'students.name', 'students.id', 'students.group')
            ->get();

        $studentInfo = [];
        $waiver_types = [];

        foreach ($waiverData as $key => $waiver) {
            if (!in_array($waiver->student_id, $studentInfo)) {
                $custom = $waiver->student_id . ' - ' . $waiver->name;
                $studentInfo[$waiver->student_id] = $custom;
            }
            if (!in_array($waiver->waiver_type_name, $waiver_types)) {
                $waiver_types[] = $waiver->waiver_type_name;
            }
        }

        return response()->json([
            "student_info" => $studentInfo,
            "waiver_types" => $waiver_types
        ]);
    }


    public function GetDataListOfWaiverData(Request $request, $school_code)
    {
        $class = $request->input('class');
        $waiver_type = $request->input('waiver_type');
        $student_id = $request->input('student_id');

        $waiverData = Waiver::where("waivers.schoolCode", $school_code)
            ->where('waivers.action', 'approved')
            ->join('students', 'waivers.student_id', '=', 'students.id')
            ->select('students.Class_name', 'students.student_id', 'students.id', 'students.name')
            ->pluck('students.id', 'students.student_id')
            ->toArray();

        $student_id = explode(" - ", $student_id)[0];


        $individualWaiverData = Waiver::where("waivers.schoolCode", $school_code)
            ->where('waivers.action', 'approved')
            ->join('add_fees', 'fee_id', '=', 'add_fees.id')
            ->join('students', 'waivers.student_id', '=', 'students.id')
            ->select('waivers.*', 'students.name', 'students.Class_name', 'students.student_id', 'add_fees.fee_amount', 'add_fees.fee_type')
            ->when($class !== 'Select', function ($query) use ($class) {
                return $query->where('students.Class_name', $class);
            })
            ->when(isset($waiverData[$student_id]), function ($query) use ($waiverData, $student_id) {
                return $query->where('students.id', $waiverData[$student_id]);
            })
            ->when($waiver_type != "Select", function ($query) use ($waiver_type) {
                return $query->where('waivers.waiver_type_name', $waiver_type);
            })
            ->get();

        if (count($individualWaiverData) == 0) {
            return redirect()->back()->with('error', 'No data found');
        }


        $totalFeeAmount = 0;
        $totalDiscount = 0;
        foreach ($individualWaiverData as $key => $waiver) {
            $totalFeeAmount += intval($waiver->fee_amount);
            $totalDiscount += $waiver->waiver_amount;
        }

        $schoolInfo = SchoolInfo::where('school_code', $school_code)->first();
        $date = now();
        return view('Backend/Student_accounts/Reports(Students_Fees)/ListOfSpecialDiscountPrint', compact('schoolInfo', 'date', 'individualWaiverData', 'totalFeeAmount', 'totalDiscount'));
    }
}
