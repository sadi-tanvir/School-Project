<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddPaySlipType;
use App\Models\GeneratePayslip;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListOfMonthWiseFeesController extends Controller
{
    public function listOfMonthWiseFees(Request $request, $school_code)
    {
        $classes = AddClass::where('school_code', $school_code)
            ->where('action', 'approved')
            ->get();

        $payslips = AddPaySlipType::where('school_code', $school_code)
            ->where('action', 'approved')
            ->get();

        $payslipsYear = GeneratePayslip::where('school_code', $school_code)
            ->where('action', 'approved')
            ->select('year')
            ->distinct()
            ->get();

        return view('Backend/Student_accounts/Reports(Students_Fees)/listOfMonthWiseFees', compact('classes', 'payslips', 'payslipsYear'));
    }

    public function GetClassWiseGroupsAndSection(Request $request, $school_code)
    {
        $className = $request->query('class_name');

        $groups = AddClassWiseGroup::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('class_name', $className)
            ->select('class_name', 'group_name')
            ->get();

        $sections = AddClassWiseSection::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('class_name', $className)
            ->select('class_name', 'section_name')
            ->get();

        $student_info = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('Class_name', $className)
            ->select('student_roll', 'name', 'student_id')
            ->get();

        return response()->json([
            "groups" => $groups,
            "sections" => $sections,
            "student_info" => $student_info,
        ]);
    }

    public function getMothWiseFeesInfo(Request $request, $school_code)
    {
        $class = $request->input('class');
        $group = $request->input("group");
        $section = $request->input("section");
        $student_id = $request->input("student_roll");
        $payslip_type = $request->input("payslip_type");
        $year = $request->input("year");
        $payment_status = $request->input("status", 'paid');
        // dd($payslip_type);
        $date = now();

        // get fees wise student information
        $payslips = GeneratePayslip::where('generate_payslips.school_code', $school_code)
            ->when($class !== "Select", function ($query) use ($class) {
                return $query->where('class', $class);
            })
            ->when($group !== "Select", function ($query) use ($group) {
                return $query->where('generate_payslips.group', $group);
            })
            ->when($section !== "Select", function ($query) use ($section) {
                return $query->where('generate_payslips.section', $section);
            })
            ->when($payslip_type !== "Select", function ($query) use ($payslip_type) {
                return $query->where('generate_payslips.pay_slip_type', $payslip_type);
            })
            ->when($student_id !== null, function ($query) use ($student_id) {
                return $query->where('generate_payslips.student_id', $student_id);
            })
            ->when($year !== "Select", function ($query) use ($year) {
                return $query->where('generate_payslips.year', $year);
            })
            ->join('students', function ($join) use ($school_code) {
                $join->on('generate_payslips.student_id', '=', 'students.student_id')
                    ->where('students.school_code', '=', $school_code);
            })->select(
                'generate_payslips.student_id',
                'students.student_roll',
                'students.name',
                'generate_payslips.class',
                'generate_payslips.class_position',
                'generate_payslips.payment_status',
            )->groupBy(
                'generate_payslips.student_id',
                'students.student_roll',
                'students.name',
                'generate_payslips.class',
                'generate_payslips.class_position',
                'generate_payslips.payment_status',
            )
            ->where('generate_payslips.payment_status', $payment_status)
            ->orderBy('generate_payslips.class_position', 'asc')
            ->get();


        // month wise amount information
        $payslipsMonthInfo = GeneratePayslip::where('generate_payslips.school_code', $school_code)
            ->when($class !== "Select", function ($query) use ($class) {
                return $query->where('class', $class);
            })
            ->when($group !== "Select", function ($query) use ($group) {
                return $query->where('generate_payslips.group', $group);
            })
            ->when($section !== "Select", function ($query) use ($section) {
                return $query->where('generate_payslips.section', $section);
            })
            ->when($student_id !== null, function ($query) use ($student_id) {
                return $query->where('generate_payslips.student_id', $student_id);
            })
            ->when($payslip_type !== "Select", function ($query) use ($payslip_type) {
                return $query->where('generate_payslips.pay_slip_type', $payslip_type);
            })
            ->when($year !== "Select", function ($query) use ($year) {
                return $query->where('generate_payslips.year', $year);
            })
            ->where('generate_payslips.payment_status', $payment_status)
            ->join('students', function ($join) use ($school_code) {
                $join->on('generate_payslips.student_id', '=', 'students.student_id')
                    ->where('students.school_code', '=', $school_code);
            })
            ->select(
                'generate_payslips.student_id',
                'students.student_roll',
                'students.name',
                'generate_payslips.class',
                'generate_payslips.payment_status',
                'generate_payslips.month',
                'generate_payslips.year',
                DB::raw('SUM(generate_payslips.amount) as amount'),
                DB::raw('SUM(generate_payslips.paid_amount) as paid_amount'),
                DB::raw('SUM(generate_payslips.waiver) as waiver'),
                DB::raw('SUM(generate_payslips.payable) as payable')
            )->groupBy(
                'generate_payslips.student_id',
                'students.student_roll',
                'students.name',
                'generate_payslips.class',
                'generate_payslips.payment_status',
                'generate_payslips.month',
                'generate_payslips.year',
            )->get();

        // organize month wise fees info for each student
        $studentAndMonthWiseData = [];
        foreach ($payslipsMonthInfo as $key => $payslipMonth) {
            $studentAndMonthWiseData[$payslipMonth->student_id][$payslipMonth->month] = $payslipMonth;
            $studentAndMonthWiseData[$payslipMonth->student_id]['all_month_paid_amount'] = $payslipsMonthInfo->where('student_id', $payslipMonth->student_id)->sum('paid_amount');
            $studentAndMonthWiseData[$payslipMonth->student_id]['all_month_unpaid_amount'] = $payslipsMonthInfo->where('student_id', $payslipMonth->student_id)->sum('payable');
        }

        // the sum of all due or paid amounts according to the given result
        $institute_due_amount = $payslipsMonthInfo->sum('payable');
        $institute_paid_amount = $payslipsMonthInfo->sum('paid_amount');


        if (count($payslips) == 0) {
            return redirect()->back()->with('error', 'No data found');
        } else {
            return view("Backend.Student_accounts.Reports(Students_Fees).ListOfMonthWiseFeesPrint", compact('date', 'payslips', 'studentAndMonthWiseData', 'payment_status', 'institute_due_amount', 'institute_paid_amount'));
        }
    }


    public function GetAllPaidUnpaidDetailsInformation(Request $request, $student_id, $payment_status, $school_code)
    {
        $date = now();

        $payslips = GeneratePayslip::where('school_code', $school_code)
            ->where('student_id', $student_id)
            ->where('payment_status', $payment_status)
            ->get();

        $studentInfo = Student::where('school_code', $school_code)
            ->where('student_id', $student_id)
            ->select('name', 'Class_name', 'mobile_no', 'student_roll')
            ->first();

        $totalAmount = $payslips->sum('amount');
        $totalReceived = $payslips->sum('paid_amount');
        $totalWaiver = $payslips->sum('waiver');
        $totalDue = $payslips->sum('payable');
        return view("Backend.Student_accounts.Reports(Students_Fees).ListOfMonthWiseFeesDetailsPrint", compact('date', 'payslips', 'totalAmount', 'totalReceived', 'totalWaiver', 'totalDue', 'studentInfo'));
    }
}
