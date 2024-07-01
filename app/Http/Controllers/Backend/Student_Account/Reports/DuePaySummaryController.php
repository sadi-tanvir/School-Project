<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\GeneratePayslip;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DuePaySummaryController extends Controller
{
    public function DuepaySummary(Request $request, $school_code)
    {
        $classes = AddClass::where('school_code', $school_code)
            ->where('action', 'approved')
            ->get();
        return view('Backend/Student_accounts/Reports(Students_Fees)/duePaySummary', compact('school_code', 'classes'));
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

    public function GetStudentInformation(Request $request, $school_code)
    {
        $className = $request->query('class_name');
        $groupName = $request->query('group_name');
        $sectionName = $request->query('section_name');

        $student_info = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('Class_name', $className)
            ->when($groupName !== "Select", function ($query) use ($groupName) {
                return $query->where('group', $groupName);
            })
            ->when($sectionName !== "Select", function ($query) use ($sectionName) {
                return $query->where('section', $sectionName);
            })
            ->select('student_roll', 'name', 'student_id', 'group')
            ->get();

        return response()->json([
            "student_info" => $student_info,
        ]);
    }

    public function GetAllPaidUnpaidInformation(Request $request, $school_code)
    {
        // dd($request->all());
        $date = now();
        $sortType = $request->session()->get('sessionSortType', $request->input('sortType', 'class_position'));
        $sortOrder = $request->session()->get('sessionSortOrder', $request->input('sortType', 'asc'));
        $class = $request->session()->get('sessionClass', $request->input('class'));
        $group = $request->session()->get('sessionGroup', $request->input('group'));
        $section = $request->session()->get('sessionSection', $request->input('section'));
        $student_id = $request->session()->get('sessionStudent_id', $request->input('student_id'));
        $payment_status = $request->session()->get('sessionPayment_status', $request->input('payment_status', 'unpaid'));

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
            ->when($student_id !== null, function ($query) use ($student_id) {
                return $query->where('generate_payslips.student_id', $student_id);
            })
            ->join('students', function ($join) use ($school_code) {
                $join->on('generate_payslips.student_id', '=', 'students.student_id')
                    ->where('students.school_code', '=', $school_code); // Use dynamic school_code
            })
            ->select(
                'generate_payslips.student_id',
                'students.name',
                'generate_payslips.class',
                'generate_payslips.payment_status',
                'generate_payslips.collect_date',
                'generate_payslips.class_position',
                DB::raw('SUM(generate_payslips.amount) as amount'),
                DB::raw('SUM(generate_payslips.paid_amount) as paid_amount'),
                DB::raw('SUM(generate_payslips.waiver) as waiver'),
                DB::raw('SUM(generate_payslips.payable) as payable')
            )
            ->groupBy(
                'generate_payslips.student_id',
                'students.name',
                'generate_payslips.class',
                'generate_payslips.payment_status',
                'generate_payslips.collect_date',
                'generate_payslips.class_position'
            )
            ->where('generate_payslips.payment_status', $payment_status)
            ->orderBy($sortType, $sortOrder)
            ->get();



        // dd($payslips);

        $totalAmount = $payslips->sum('amount');
        $totalReceived = $payslips->sum('paid_amount');
        $totalWaiver = $payslips->sum('waiver');
        $totalDue = $payslips->sum('payable');

        if (count($payslips) == 0) {
            return redirect()->back()->with('error', 'No data found');
        } else {
            return view("Backend.Student_accounts.Reports(Students_Fees).duePaySummaryPrint", compact('date', 'payslips', 'totalAmount', 'totalReceived', 'totalWaiver', 'totalDue', 'class', 'group', 'section', 'student_id', 'payment_status', 'sortType', 'sortOrder'));
        }
    }

    public function GetSortingWisePaidUnpaidReports(Request $request, $school_code)
    {
        // dd($request->all());

        $sortOrder = $request->input('sortOrder');
        $sortType = $request->input('sortType');
        $class = $request->input('class');
        $group = $request->input('group');
        $section = $request->input('section');
        $student_id = $request->input('student_id');
        $payment_status = $request->input('payment_status');

        return redirect()->route('DuepaySummary.info', $school_code)->with([
            'sessionSortType' => $sortType,
            'sessionSortOrder' => $sortOrder,
            'sessionClass' => $class,
            'sessionGroup' => $group,
            'sessionSection' => $section,
            'sessionStudent_id' => $student_id,
            'sessionPayment_status' => $payment_status,
        ]);
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
        return view("Backend.Student_accounts.Reports(Students_Fees).duePaySummaryDetailsPrint", compact('date', 'payslips', 'totalAmount', 'totalReceived', 'totalWaiver', 'totalDue', 'studentInfo'));
    }
}
