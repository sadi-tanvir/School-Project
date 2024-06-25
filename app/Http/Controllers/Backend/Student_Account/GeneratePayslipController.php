<?php

namespace App\Http\Controllers\Backend\Student_Account;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddPaySlip;
use App\Models\GeneratePayslip;
use App\Models\Student;
use App\Models\Waiver;
use Illuminate\Http\Request;

class GeneratePayslipController extends Controller
{
    public function GeneratePayslipView(Request $request, $school_code)
    {
        $classes = AddClass::where("action", "approved")
            ->where("school_code", $school_code)
            ->select("class_name")
            ->get();

        $academicSessions = AddAcademicSession::where('action', 'approved')
            ->where('school_code', $school_code)
            ->get();

        $academicYears = AddAcademicYear::where('action', 'approved')
            ->where('school_code', $school_code)
            ->select('academic_year_name')
            ->get();

        return view("Backend.Student_accounts.GeneratePayslip", compact("classes", 'academicSessions', 'school_code', 'academicYears'));
    }

    public function GetPaySlipData(Request $request, $school_code)
    {
        $class_name = $request->query('class_name');
        $group_name = $request->query('group_name');

        $PaySlipData = AddPaySlip::where("school_code", $school_code)
            ->where('action', 'approved')
            ->where('class_name', $class_name)
            ->when($group_name !== "Select", function ($query) use ($group_name) {
                return $query->where('group_name', $group_name);
            })
            ->select('pay_slip_type')
            ->distinct()
            ->get();

        $groupData = AddClassWiseGroup::where('school_code', $school_code)
            ->where('class_name', $class_name)
            ->select('group_name')
            ->get();

        $sectionData = AddClassWiseSection::where('school_code', $school_code)
            ->where('class_name', $class_name)
            ->select('section_name')
            ->get();

        $categoryData = AddCategory::where('school_code', $school_code)
            ->where('action', 'approved')
            ->select('category_name')
            ->get();

        return response()->json([
            'paySlipData' => $PaySlipData,
            'groupData' => $groupData,
            'sectionData' => $sectionData,
            'categoryData' => $categoryData,
        ]);
    }

    public function GetAllInformation(Request $request, $school_code)
    {
        $class = $request->query('class_name');
        $classPosition = AddClass::where('school_code', $school_code)
            ->where('class_name', $class)
            ->select('position')
            ->first();
        $group = $request->query('group_name');
        $category = $request->query('category');
        $section = $request->query('section');
        $month_year = $request->query('month_year');
        $pay_slip_type = $request->query('pay_slip_type');
        $session = $request->query('session');
        $academic_year = $request->query('academic_year');

        $students = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('Class_name', $class)
            ->when($group !== "Select", function ($query) use ($group) {
                return $query->where('group', $group);
            })
            ->when($category !== "Select", function ($query) use ($category) {
                return $query->where('category', $category);
            })
            ->when($section !== "Select", function ($query) use ($section) {
                return $query->where('section', $section);
            })
            ->when($session !== "Select", function ($query) use ($session) {
                return $query->where('session', $session);
            })
            ->when($academic_year !== "Select", function ($query) use ($academic_year) {
                return $query->where('year', $academic_year);
            })
            ->get();

        $amountOfPaySlip = AddPaySlip::where("school_code", $school_code)
            ->where('action', 'approved')
            ->where('class_name', $class)
            ->when($group !== "Select", function ($query) use ($group) {
                return $query->where('group_name', $group);
            })
            ->where('pay_slip_type', $pay_slip_type)
            ->sum('fees_amount');


        $tempFeesTypes = AddPaySlip::where("school_code", $school_code)
            ->where('action', 'approved')
            ->where('class_name', $class)
            ->when($group !== "Select", function ($query) use ($group) {
                return $query->where('group_name', $group);
            })
            ->where('pay_slip_type', $pay_slip_type)
            ->select('fee_type_name')
            ->get();

        $tabledata = [];
        foreach ($students as $key => $student) {
            $totalIndividualWaiver = 0;
            foreach ($tempFeesTypes as $key => $fee) {
                $tempWaiverAmount = Waiver::where('schoolCode', $school_code)
                    ->where('action', 'approved')
                    ->where('student_id', $student->id)
                    ->where('fee_type_name', $fee->fee_type_name)
                    ->select('waiver_amount')
                    ->first();
                if ($tempWaiverAmount) {
                    $totalIndividualWaiver += $tempWaiverAmount->waiver_amount;
                }
            }

            $temp_data = [
                // 'student_table_id' => $student->id,
                'month_year' => $month_year,
                'student_id' => $student->student_id,
                'student_name' => $student->name,
                'class' => $student->Class_name,
                'group' => $student->group,
                'category' => $student->category,
                'class_position' => $classPosition->position,
                'section' => $student->section,
                'student_roll' => $student->student_roll,
                'pay_slip_type' => $pay_slip_type,
                'fees_amount' => $amountOfPaySlip,
                'waiver' => $totalIndividualWaiver,
                'payable' => $amountOfPaySlip - $totalIndividualWaiver,
            ];

            $tabledata[] = $temp_data;
        }

        return $tabledata;
    }


    public function StoreGeneratePaySlip(Request $request, $school_code)
    {
        dd($request->all());
        $month = $request->input('month');
        $year = $request->input('year');
        $last_pay_date = $request->input('last_pay_date');
        $class = $request->input('class');
        $class_positions = $request->input('input_class_position', []);
        $input_sections = $request->input('input_section', []);
        $input_category = $request->input('input_category', []);
        dd($input_category);
        // $group = $request->input('group');
        $groups = $request->input('input_group', []);
        $pay_slip_type = $request->input('pay_slip_type');
        $selected_students = $request->input('select', []);
        // $input_month_year = $request->input('input_month_year', []);
        $input_student_id = $request->input('input_student_id', []);
        $input_student_name = $request->input('input_student_name', []);
        // $input_class = $request->input('input_class', []);
        // $input_student_roll = $request->input('input_student_roll', []);
        // $input_pay_slip_type = $request->input('input_pay_slip_type', []);
        $input_fees_amount = $request->input('input_fees_amount', []);
        $input_waiver = $request->input('input_waiver', []);

        if (count($selected_students) == 0) {
            return redirect()->back()->with('error', 'Please Select Atleast One Student');
        }

        foreach ($input_student_name as $student_id => $value) {
            if (isset($selected_students[$student_id])) {
                GeneratePayslip::firstOrCreate(
                    [
                        'school_code' => $school_code,
                        'action' => 'approved',
                        'student_id' => $input_student_id[$student_id],
                        'month' => $month,
                        'year' => $year,
                        'class' => $class,
                        'group' => $groups[$student_id],
                        'category' => $input_category[$student_id] ?? null,
                        'section' => $input_sections[$student_id]  ?? null,
                        'pay_slip_type' => $pay_slip_type,
                    ],
                    [
                        'class_position' => $class_positions[$student_id],
                        'last_pay_date' => $last_pay_date,
                        'amount' => $input_fees_amount[$student_id],
                        'waiver' => $input_waiver[$student_id],
                        'payable' => $input_fees_amount[$student_id] - $input_waiver[$student_id],
                    ]
                );
            }
        }


        return redirect()->back()->with('success', 'Payslip Generated Successfully');
    }
}
