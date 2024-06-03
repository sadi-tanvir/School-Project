<?php

namespace App\Http\Controllers\Backend\Student_Account;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddSection;
use App\Models\GeneratePayslip;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintUnpaidPaySlipController extends Controller
{
    public function PrintUnpaidPaySlipForm(Request $request, $school_code)
    {
        // get year of student list
        $years = Student::where('school_code', $school_code)
            ->select('year')
            ->orderBy('year', 'desc')
            ->distinct()
            ->get();

        // get class name
        $classes = Student::where('school_code', $school_code)
            ->select('Class_name')
            ->distinct()
            ->get();

        return view("Backend.Student_accounts.PrintUnpaidPaySlip", compact('school_code', 'years', 'classes'));
    }

    public function GetSectionAndGroup(Request $request, $school_code)
    {
        $class = $request->query('class_name');
        $year = $request->query('year');

        // get section
        $studentsSection = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('year', $year)
            ->where('Class_name', $class)
            ->orderBy('section', 'asc')
            ->select('section')
            ->distinct()
            ->get();

        // get group
        $studentGroups = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('year', $year)
            ->where('Class_name', $class)
            ->orderBy('group', 'asc')
            ->select('group')
            ->distinct()
            ->get();

        // get student info
        $student_info = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('year', $year)
            ->where('Class_name', $class)
            ->select('student_roll', 'name', 'student_id')
            ->get();

        return response()->json([
            "section" => $studentsSection,
            "group" => $studentGroups,
            "student_info" => $student_info
        ]);
    }

    public function GetStudentRoll(Request $request, $school_code)
    {
        $class = $request->query('class');
        $section = $request->query('section');
        $group = $request->query('group');

        // get student info
        $student_info = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('Class_name', $class)
            ->when($group !== "Select", function ($query) use ($group) {
                return $query->where('group', $group);
            })
            ->when($section !== "Select", function ($query) use ($section) {
                return $query->where('section', $section);
            })
            ->select('student_roll', 'name', 'student_id')
            ->get();

        return response()->json([
            "student_info" => $student_info
        ]);
    }


    public function GetSingleUnpaidPayslip(Request $request, $school_code)
    {
        $class_name = $request->query('class_name');
        $section = $request->query('section');
        $year = $request->query('year');
        $group = $request->query('group');
        $studentID = $request->query('student_id');

        $paySlips = GeneratePayslip::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('year', $year)
            ->where('class', $class_name)
            ->when($section !== "Select", function ($query) use ($section) {
                return $query->where('section', $section);
            })
            ->when($group !== "Select", function ($query) use ($group) {
                return $query->where('group', $group);
            })
            ->where('student_id', $studentID)
            ->where('payment_status', 'unpaid')
            ->distinct('pay_slip_type', 'month')
            ->select('pay_slip_type', 'month', 'year')
            ->get();

        return response()->json([
            "paySlips" => $paySlips
        ]);
    }


    public function GetAllStudentUnpaidPayslip(Request $request, $school_code)
    {
        $class_name = $request->query('class_name');
        $section = $request->query('section');
        $year = $request->query('year');
        $group = $request->query('group');

        $paySlips = GeneratePayslip::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('year', $year)
            ->where('class', $class_name)
            ->when($section !== null, function ($query) use ($section) {
                return $query->where('section', $section);
            })
            ->when($group !== null, function ($query) use ($group) {
                return $query->where('group', $group);
            })
            ->where('payment_status', 'unpaid')
            ->distinct('pay_slip_type', 'month')
            ->select('pay_slip_type', 'month', 'year')
            ->get();

        return response()->json([
            "paySlips" => $paySlips
        ]);
    }

    public function PrintUnpaidInvoice(Request $request, $school_code)
    {
        $paySlipIds = $request->input('payslip-', []);
        $inputStudentId = $request->input('student_id');
        $last_payment_date = $request->input('last_payment_date');
        $allPaySlipsInfo = [];
        $payslipTypes = [];

        foreach ($paySlipIds as $key => $value) {
            $explodedVal = explode('-', $value);
            $payslipTypes[$key]["fee_type"] = $explodedVal[0];
            $payslipTypes[$key]["month"] = $explodedVal[1];
            $payslipTypes[$key]["year"] = $explodedVal[2];
        }

        if ($inputStudentId) {
            foreach ($payslipTypes as $payslip) {
                $pay_slips = GeneratePayslip::where('school_code', $school_code)
                    ->where('action', 'approved')
                    ->where('pay_slip_type', $payslip["fee_type"])
                    ->where('month', $payslip["month"])
                    ->where('year', $payslip["year"])
                    ->where('student_id', $inputStudentId)
                    ->where('payment_status', 'unpaid')
                    ->select('id', 'pay_slip_type', 'student_id', 'class', 'group', 'month', 'year', 'amount', 'waiver', 'payable', 'paid_amount')
                    ->get();

                foreach ($pay_slips as $individualSlip) {
                    $studentId = $individualSlip->student_id;

                    if (!isset($allPaySlipsInfo[$studentId])) {
                        $allPaySlipsInfo[$studentId] = [
                            'slips' => [],
                            'total_amount' => 0,
                            'total_waiver' => 0,
                            'total_paid' => 0,
                            'total_payable' => 0,
                        ];
                    }
                    $allPaySlipsInfo[$studentId]['slips'][] = $individualSlip;
                    $allPaySlipsInfo[$studentId]['total_amount'] += $individualSlip->amount;
                    $allPaySlipsInfo[$studentId]['total_waiver'] += $individualSlip->waiver;
                    $allPaySlipsInfo[$studentId]['total_paid'] += $individualSlip->paid_amount;
                    $allPaySlipsInfo[$studentId]['total_payable'] += $individualSlip->payable;
                }
            }
        } else {
            foreach ($payslipTypes as $payslip) {
                $pay_slips = GeneratePayslip::where('school_code', $school_code)
                    ->where('action', 'approved')
                    ->where('pay_slip_type', $payslip["fee_type"])
                    ->where('month', $payslip["month"])
                    ->where('year', $payslip["year"])
                    ->where('payment_status', 'unpaid')
                    ->select('id', 'pay_slip_type', 'student_id', 'class', 'group', 'month', 'year', 'amount', 'waiver', 'payable', 'paid_amount')
                    ->get();

                foreach ($pay_slips as $individualSlip) {
                    $studentId = $individualSlip->student_id;

                    if (!isset($allPaySlipsInfo[$studentId])) {
                        $allPaySlipsInfo[$studentId] = [
                            'slips' => [],
                            'total_amount' => 0,
                            'total_waiver' => 0,
                            'total_paid' => 0,
                            'total_payable' => 0,
                        ];
                    }
                    $allPaySlipsInfo[$studentId]['slips'][] = $individualSlip;
                    $allPaySlipsInfo[$studentId]['total_amount'] += $individualSlip->amount;
                    $allPaySlipsInfo[$studentId]['total_waiver'] += $individualSlip->waiver;
                    $allPaySlipsInfo[$studentId]['total_paid'] += $individualSlip->paid_amount;
                    $allPaySlipsInfo[$studentId]['total_payable'] += $individualSlip->payable;
                }
            }
        }

        // get student info
        foreach ($allPaySlipsInfo as $studentIdKey => $value) {
            $studentInfo = Student::where('school_code', $school_code)
                ->where('student_id', $studentIdKey)
                ->select('student_roll', 'student_id', 'name', 'section', 'group', 'Class_name', 'year')
                ->first();

            $allPaySlipsInfo[$studentIdKey]['student_info'] = $studentInfo;
        }

        return view('Backend.Student_accounts.UnpaidPaySlipInvoice', compact('allPaySlipsInfo', 'last_payment_date'));
    }
}
