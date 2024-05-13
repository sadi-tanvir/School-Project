<?php

namespace App\Http\Controllers\Backend\Student_Account;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddGroup;
use App\Models\AddPaySlip;
use App\Models\AddPaySlipType;
use App\Models\GeneratePayslip;
use App\Models\Student;
use App\Models\Waiver;
use Illuminate\Http\Request;

class GenerateMultiplePayslipController extends Controller
{
    public function GenerateMultiplePayslipView(Request $request, $school_code)
    {
        $classes = AddClass::where("action", "approved")
            ->where("school_code", $school_code)
            ->select("class_name")
            ->get();

        $groups = AddGroup::where("action", "approved")
            ->where("school_code", $school_code)
            ->select("group_name")
            ->get();

        $PaySlipTypes = AddPaySlipType::where("action", "approved")
            ->where("school_code", $school_code)
            ->select("pay_slip_type_name")
            ->get();


        $academicSessions = AddAcademicSession::where('action', 'approved')
            ->where('school_code', $school_code)
            ->select('academic_session_name')
            ->get();

        $academicYears = AddAcademicYear::where('action', 'approved')
            ->where('school_code', $school_code)
            ->select('academic_year_name')
            ->get();

        return view("Backend.Student_accounts.GenerateMultiplePayslip", compact("school_code", "classes", "groups", "PaySlipTypes", "academicSessions", "academicYears"));
    }

    public function GetStudentInformation(Request $request, $school_code)
    {
        $monthQuery = $request->query("months");
        $classQuery = $request->query("classes");
        $groupQuery = $request->query("group");
        $yearQuery = $request->query("year");
        $pay_slip_type = $request->query("pay_slip_type");
        $academic_session = $request->query("academic_session");
        $academic_year = $request->query("academic_year");

        $test = $monthQuery;

        $allStudents = [];
        $classesArray = explode(',', $classQuery);
        $monthsArray = explode(',', $monthQuery);
        $classWisePaySlipAmount = [];


        $monthWiseAllClassStudent = [];

        foreach ($classesArray as $class) {
            foreach ($monthsArray as $month) {
                $studentsForClass = Student::where("school_code", $school_code)
                    ->where('action', 'approved')
                    ->where("class_name", $class)
                    ->select("id", "nedubd_student_id", "student_roll", "name", "Class_name", "group")
                    ->get();

                $allStudents = array_merge($allStudents, [$class => $studentsForClass->toArray()]);

                // Getting payslip information
                $paySlipInfo = AddPaySlip::where("school_code", $school_code)
                    ->where('action', 'approved')
                    ->where("class_name", $class)
                    ->when($groupQuery !== "Select", function ($query) use ($groupQuery) {
                        return $query->where('group_name', $groupQuery);
                    })
                    ->when($academic_session !== "Select", function ($query) use ($academic_session) {
                        return $query->where('session', $academic_session);
                    })
                    ->when($academic_year !== "Select", function ($query) use ($academic_year) {
                        return $query->where('year', $academic_year);
                    })
                    ->where('pay_slip_type', $pay_slip_type)
                    ->select('class_name', 'group_name', "fees_amount", "fee_type_name")
                    ->get();

                $tempPaySlipAmount = 0;
                $setPaySlipInfo = [];
                foreach ($paySlipInfo as $key => $fee) {
                    $tempPaySlipAmount = $fee->fees_amount + $tempPaySlipAmount;
                    $setPaySlipInfo = [
                        'class_name' => $fee->class_name,
                        'group_name' => $fee->group_name,
                        'pay_slip_amount' => $tempPaySlipAmount
                    ];
                }

                if (count($setPaySlipInfo) > 0) {
                    $classWisePaySlipAmount[] = $setPaySlipInfo;
                }

                foreach ($allStudents[$class] as $key => $student) {
                    $student['pay_slip_amount'] = 0;
                    $student['pay_slip_type'] = $pay_slip_type;
                    foreach ($classWisePaySlipAmount as $paySlip) {
                        if ($student['Class_name'] == $paySlip['class_name'] && $student['group'] == $paySlip['group_name']) {
                            $student['pay_slip_amount'] = $paySlip['pay_slip_amount'];
                        }
                    }
                    $allStudents[$class][$key] = $student;
                }

                // Get class => student-wise waiver information
                foreach ($allStudents[$class] as $key => $student) {
                    $totalIndividualWaiver = 0;
                    foreach ($paySlipInfo as $fee) {
                        $tempWaiverAmount = Waiver::where('schoolCode', $school_code)
                            ->where('action', 'approved')
                            ->where('student_id', $student['id'])
                            ->where('fee_type_name', $fee->fee_type_name)
                            ->select('waiver_amount')
                            ->first();
                        if ($tempWaiverAmount) {
                            $totalIndividualWaiver += $tempWaiverAmount->waiver_amount;
                        }
                    }
                    $student['waiver'] = $totalIndividualWaiver;
                    $student['payable'] = $student['pay_slip_amount'] - $totalIndividualWaiver;
                    $student['month_year'] = $month . "." . $yearQuery;
                    $allStudents[$class][$key] = $student;
                }

                $monthWiseAllClassStudent[$month][] = [
                    'class' => $class,
                    'students' => $allStudents[$class]
                ];
            }
        }
        return $monthWiseAllClassStudent;
    }



    public function StoreMultiplePayslipData(Request $request, $school_code)
    {
        $monthList = [
            "january" => "01",
            "february" => "02",
            "march" => "03",
            "april" => "04",
            "may" => "05",
            "june" => "06",
            "july" => "07",
            "august" => "08",
            "september" => "09",
            "october" => "10",
            "november" => "11",
            "december" => "12"
        ];

        try {
            $commonPaySlipType = $request->input("pay_slip_type");
            $commonYear = $request->input("year");
            $commonLastPayDate = $request->input("last_pay_date");
            $relatedMonth = explode("-", $commonLastPayDate);
            $monthYears = $request->input("input_month_year", []);
            $studentIds = $request->input("input_nedubd_student_id", []);
            // $studentNames = $request->input("input_name", []);
            $studentClasses = $request->input("input_Class_name", []);
            // $studentRoles = $request->input("input_student_roll", []);
            $studentPaySlipAmounts = $request->input("input_pay_slip_amount", []);
            $studentWaiver = $request->input("input_waiver", []);
            $studentPayable = $request->input("input_payable", []);
            $studentGroups = $request->input("input_group", []);
            // $input_pay_slip_types = $request->input("input_pay_slip_type", []);


            foreach ($studentIds as $studentId) {
                foreach ($monthYears as $key => $individualMonthYear) {
                    foreach ($individualMonthYear as $key2 => $monthYear) {
                        $month = explode(".", $monthYear)[0];
                        // $year = explode(".", $monthYear)[1];
                        $IndividualLastPayDate = $relatedMonth[0] . "-" . $monthList[$month] . "-" . $relatedMonth[2];
                        GeneratePayslip::updateOrCreate(
                            [
                                'student_id' => $studentId,
                                'action' => 'approved',
                                'school_code' => $school_code,
                                'month' => $month,
                                'year' => $commonYear,
                                'class' => $studentClasses[$studentId],
                                'pay_slip_type' => $commonPaySlipType,
                            ],
                            [
                                'last_pay_date' => $IndividualLastPayDate,
                                'group' => $studentGroups[$studentId],
                                'amount' => $studentPaySlipAmounts[$studentId],
                                'waiver' => $studentWaiver[$studentId],
                                'payable' => $studentPayable[$studentId],
                            ]
                        );
                    }
                }
            }

            return redirect()->back()->with('success', 'Multiple Payslips Generated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while Generating Multiple Payslips.');
        }
    }
}
