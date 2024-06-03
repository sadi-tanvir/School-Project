<?php

namespace App\Http\Controllers\Backend\Student_Account;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddGroup;
use App\Models\AddPaySlip;
use App\Models\AddSection;
use App\Models\GeneratePayslip;
use App\Models\Student;
use App\Models\Waiver;
use Illuminate\Http\Request;

class EditGeneratedPayslipController extends Controller
{
    public function EditGeneratedPayslipView(Request $request, $school_code)
    {
        $classes = AddClass::where("action", "approved")
            ->where("school_code", $school_code)
            ->select("class_name")
            ->get();

        $groups = AddGroup::where("action", "approved")
            ->where("school_code", $school_code)
            ->select("group_name")
            ->get();

        $sections = AddSection::where('action', 'approved')
            ->where('school_code', $school_code)
            ->get();

        $academicYears = AddAcademicYear::where('action', 'approved')
            ->where('school_code', $school_code)
            ->select('academic_year_name')
            ->get();

        $payslipsSession = $request->session()->get('payslips');

        return view("Backend.Student_accounts.EditGeneratedPayslip", compact("classes", 'groups', 'sections', 'school_code', 'academicYears', 'payslipsSession'));
    }

    public function GetPaySlipData(Request $request, $school_code)
    {
        $class_name = $request->query('class_name');
        $group_name = $request->query('group_name');
        $section = $request->query('section');
        $PaySlipData = GeneratePayslip::where('school_code', $school_code)
            ->where('class', $class_name)
            ->where('group', $group_name)
            ->when($section != "Select", function ($query) use ($section) {
                return $query->where('section', $section);
            })
            ->select('pay_slip_type')
            ->distinct()
            ->get();

        $studentIds = GeneratePayslip::where('school_code', $school_code)
            ->where('class', $class_name)
            ->where('group', $group_name)
            ->when($section != "Select", function ($query) use ($section) {
                return $query->where('section', $section);
            })
            ->select('student_id')
            ->distinct()
            ->get();

        $studentIds = $studentIds->pluck('student_id')->map(function ($id) {
            return (int) $id;
        });

        if (count($studentIds) > 0) {
            $studentsInfo = Student::where('school_code', $school_code)
                ->whereIn('student_id', $studentIds)
                ->select('student_id', 'name', 'student_roll')
                ->get();
        }

        return response()->json([
            'pay_slip_data' => $PaySlipData,
            'students_info' => $studentsInfo
        ]);
    }

    public function GetAllInformation(Request $request, $school_code)
    {
        $class = $request->input('class');
        $group = $request->input('group');
        $pay_slip_type = $request->input('pay_slip_type');
        $month = $request->input('month');
        $year = $request->input('year');
        $section = $request->input('section');
        $student_id = $request->input('student_id');

        // dd($class, $group, $pay_slip_type, $month, $year, $section, $student_id);

        $payslips = GeneratePayslip::where('school_code', $school_code)
            ->where('class', $class)
            ->where('group', $group)
            ->where('month', $month)
            ->where('year', $year)
            ->where('pay_slip_type', $pay_slip_type)
            ->when($section != "Select", function ($query) use ($section) {
                return $query->where('section', $section);
            })
            ->when($student_id != null, function ($query) use ($student_id) {
                return $query->where('student_id', $student_id);
            })
            // ->select('student_id', 'class', 'pay_slip_type', 'amount', 'payable')
            ->get();

        // dd($payslips);
        return redirect()->route('editGeneratedPayslip.view', $school_code)->with([
            'payslips' => $payslips
        ]);
    }

}
