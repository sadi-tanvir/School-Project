<?php

namespace App\Http\Controllers\Backend\Student_Account;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddSection;
use App\Models\GeneratePayslip;
use App\Models\SchoolInfo;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
        $note = $request->input('note');
        $printable_student_id = $request->input('printable_student_id');
        $school_info = SchoolInfo::where('school_code', $school_code)->first();
        $student_info = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('nedubd_student_id', $printable_student_id)
            ->select('name', 'year', 'student_id', 'Class_name', 'group', 'section', 'student_roll')
            ->first();

        // dd($student_info, $request->all());
        $collection_date = $request->input('collection_date');
        $voucher_number = $request->input('voucher_number');
        $total_waiver = $request->input('t_waiver');
        $total_payable = $request->input('t_payable');
        $total_amount = $request->input('t_amount');
        $collect_amount = $request->input('collect_amount');

        $input_fee_types = $request->input('input_fee_type', []);
        $input_payslip_ids = $request->input('input_payslip_id', []);
        $input_waivers = $request->input('input_waiver', []);
        $input_payable_amounts = $request->input('input_payable_amount', []);
        $input_due_amounts = $request->input('input_due_amount', []);
        $input_current_pay = $request->input('input_current_pay', []);


        $collection = new Collection($input_due_amounts);
        $total_due_amount = $collection->reduce(function ($carry, $item) {
            return intval($carry) + intval($item);
        });

        $collection2 = new Collection($input_current_pay);
        $totalCurrentPay = $collection2->reduce(function ($carry, $item) {
            return intval($carry) + intval($item);
        });


        // dd($input_fee_types);

        foreach ($input_payslip_ids as $payslip_id) {
            GeneratePayslip::where('school_code', $school_code)
                ->where('id', intval($payslip_id))
                ->update([
                    "waiver" => $input_waivers[$payslip_id],
                    "payable" => $input_due_amounts[$payslip_id],
                    "voucher_number" => $voucher_number,
                    "collect_date" => $collection_date,
                    "due_amount" => $input_due_amounts[$payslip_id],
                    "paid_amount" => $input_current_pay[$payslip_id],
                    "payment_status" => $input_due_amounts[$payslip_id] == 0 ? 'paid' : 'unpaid',
                ]);
        }

        return view(
            'Backend.Student_accounts.PaySlipInvoice',
            compact(
                'student_info',
                'school_info',
                'voucher_number',
                'collection_date',
                'total_waiver',
                'total_payable',
                'total_due_amount',
                'collect_amount',
                'input_fee_types',
                'input_waivers',
                'input_payable_amounts',
                'note',
                'totalCurrentPay'
            )
        );
    }
}
