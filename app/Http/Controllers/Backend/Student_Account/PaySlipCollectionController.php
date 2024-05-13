<?php

namespace App\Http\Controllers\Backend\Student_Account;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddSection;
use App\Models\GeneratePayslip;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaySlipCollectionController extends Controller
{
    public function PaySlipForm(Request $request, $school_code)
    {
        // get year of student list
        $years = Student::where('school_code', $school_code)
            ->select('year')
            ->orderBy('year', 'desc')
            ->distinct()
            ->get();

        $classes = AddClass::where('action', 'approved')
            ->where('school_code', $school_code)
            ->get();

        $sections = AddSection::where("action", "approved")
            ->where("school_code", $school_code)
            ->orderBy('section_name', 'asc')
            ->get();


        return view("Backend.Student_accounts.PaySlipCollection", compact('school_code', 'years', 'classes', 'sections'));
    }

    public function GetStudentRoll(Request $request, $school_code)
    {
        $class = $request->query('class_name');
        $year = $request->query('year');

        $studentsSection = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('year', $year)
            ->where('Class_name', $class)
            ->select('section')
            ->distinct()
            ->get();

        $student_info = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('year', $year)
            ->where('Class_name', $class)
            ->select('student_roll', 'name', 'nedubd_student_id')
            ->get();

        //  ->select('nedubd_student_id', 'student_id', 'student_roll', 'name')

        return response()->json([
            "section" => $studentsSection,
            "student_info" => $student_info
        ]);
    }

    public function StudentWisePaySlips(Request $request, $school_code)
    {
        $class_name = $request->query('class_name');
        $student_id = $request->query('student_id');
        $year = $request->query('year');

        $paySlips = GeneratePayslip::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('class', $class_name)
            ->where('student_id', $student_id)
            ->where('payment_status', 'unpaid')
            ->get();

        // create a uniqe voucher number
        $voucerNumber = Str::upper('#V' . uniqid());

        $studentInformation = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('year', $year)
            ->where('Class_name', $class_name)
            ->where('nedubd_student_id', $student_id)
            ->select('nedubd_student_id', 'student_roll', 'name', 'Class_name', 'group', 'mobile_no')
            ->first();

        return response()->json([
            "paySlips" => $paySlips,
            "voucher_number" => $voucerNumber,
            "student_information" => $studentInformation
        ]);
    }
    public function StorePaySlipData(Request $request, $school_code)
    {
        $collection_date = $request->input('collection_date');
        $voucher_number = $request->input('voucher_number');

        $input_payslip_ids = $request->input('input_payslip_id', []);
        $input_waivers = $request->input('input_waiver', []);
        $input_payable_amounts = $request->input('input_payable_amount', []);
        $input_due_amounts = $request->input('input_due_amount', []);
        $input_current_pay = $request->input('input_current_pay', []);

        foreach ($input_payslip_ids as $payslip_id) {
            GeneratePayslip::where('school_code', $school_code)
                ->where('id', intval($payslip_id))
                ->update([
                    "waiver" => $input_waivers[$payslip_id],
                    "payable" => $input_payable_amounts[$payslip_id],
                    "voucher_number" => $voucher_number,
                    "collect_date" => $collection_date,
                    "due_amount" => $input_due_amounts[$payslip_id],
                    "paid_amount" => $input_current_pay[$payslip_id],
                    "payment_status" => $input_payable_amounts[$payslip_id] == $input_current_pay[$payslip_id] ? 'paid' : 'unpaid',
                ]);
        }

        return redirect()->back()->with('success', 'Fees Collected Successfully');
    }
}
