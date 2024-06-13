<?php

namespace App\Http\Controllers\Backend\Student_Account;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\GeneratePayslip;
use App\Models\SchoolInfo;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;

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

        $groups = AddGroup::where("action", "approved")
            ->where("school_code", $school_code)
            ->orderBy('group_name', 'asc')
            ->get();

        $sections = AddSection::where("action", "approved")
            ->where("school_code", $school_code)
            ->orderBy('section_name', 'asc')
            ->get();


        return view("Backend.Student_accounts.PaySlipCollection", compact('school_code', 'years', 'classes', 'groups', 'sections'));
    }

    public function GetStudentRoll(Request $request, $school_code)
    {
        $class = $request->query('class_name');
        $year = $request->query('year');
        $section = $request->query('section');

        $studentsGroup = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('year', $year)
            ->where('Class_name', $class)
            ->select('group')
            ->distinct()
            ->get();

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
            ->when($section !== "Select", function ($query) use ($section) {
                return $query->where('section', $section);
            })
            ->select('student_roll', 'name', 'student_id')
            ->get();

        return response()->json([
            "group" => $studentsGroup,
            "section" => $studentsSection,
            "student_info" => $student_info
        ]);
    }

    public function StudentWisePaySlips(Request $request, $school_code)
    {
        $class_name = $request->query('class_name');
        $student_id = $request->query('student_id');
        $group = $request->query('group');
        $section = $request->query('section');
        $year = $request->query('year');

        $paySlips = GeneratePayslip::where('school_code', $school_code)
            ->where('action', 'approved')
            ->when($class_name !== "Select", function ($query) use ($class_name) {
                return $query->where('class', $class_name);
            })
            ->where('student_id', $student_id)
            ->when($group !== "Select", function ($query) use ($group) {
                return $query->where('group', $group);
            })
            ->when($section !== "Select", function ($query) use ($section) {
                return $query->where('section', $section);
            })
            ->where('payment_status', 'unpaid')
            ->get();

        // create a uniqe voucher number
        $voucerNumber = Str::upper('#V' . uniqid());

        $studentInformation = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('student_id', $student_id)
            ->select('student_id', 'student_roll', 'name', 'Class_name', 'group', 'mobile_no')
            ->first();

        return response()->json([
            "paySlips" => $paySlips,
            "voucher_number" => $voucerNumber,
            "student_information" => $studentInformation
        ]);
    }



    public function DeletePaySlip(Request $request, $school_code)
    {
        $paySlipId = $request->query('payslipId');

        $deletedPaySlip = GeneratePayslip::where('school_code', $school_code)
            ->where('id', $paySlipId)
            ->delete();

        if ($deletedPaySlip) {
            return response()->json([
                "message" => "Pay slip deleted successfully"
            ]);
        }
    }



    public function UpdatePrintPage(Request $request, $school_code)
    {
        $printPage = $request->query('printPage');

        $updatePrintPage = SchoolInfo::where('school_code', $school_code)
            ->update([
                "number_of_print_page" => intval($printPage)
            ]);

        return response()->json([
            "status" => $updatePrintPage
        ]);
    }

    public function generateQrCode($school_code, $studentId, $invoiceId)
    {
        $appUrl = env('APP_URL');
        $invoice = explode('#', $invoiceId);
        $invoiceId = $invoice[1];
        $qrCode = QrCode::size(60)->generate($appUrl . '/' . 'student-fees-info/' . $school_code . '/' . $studentId . '/' . $invoiceId);
        return $qrCode;
    }

    public function StorePaySlipData(Request $request, $school_code)
    {
        $voucher_number = $request->input('voucher_number');
        $printable_student_id = $request->input('printable_student_id');

        // generate QR-Code
        $qrcode = $this->generateQrCode($school_code, $printable_student_id, $voucher_number);

        $note = $request->input('note');
        $collected_by_name = $request->input('collected_by_name');
        $collected_by_email = $request->input('collected_by_email');
        $collected_by_phone = $request->input('collected_by_phone');
        $school_info = SchoolInfo::where('school_code', $school_code)->first();
        $student_info = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('student_id', $printable_student_id)
            ->select('name', 'year', 'student_id', 'Class_name', 'group', 'section', 'student_roll')
            ->first();

        // dd($student_info, $request->all());
        $collection_date = $request->input('collection_date');
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

        $isFeesCollected = GeneratePayslip::where('school_code', $school_code)
            ->where('voucher_number', $voucher_number)
            ->where('payment_status', 'paid')
            ->exists();

        if ($isFeesCollected) {
            return redirect()->back()->with('error', 'This invoice has already been collected');
        } else {
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
                        "note" => $note,
                        "collected_by_name" => $collected_by_name,
                        "collected_by_email" => $collected_by_email,
                        "collected_by_phone" => $collected_by_phone,
                        "payment_status" => $input_due_amounts[$payslip_id] == 0 ? 'paid' : 'unpaid',
                    ]);
            }

            return view(
                'Backend.Student_accounts.PaySlipInvoice',
                compact(
                    'school_code',
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
                    'totalCurrentPay',
                    'collected_by_name',
                    'qrcode'
                )
            );
        }
    }


    // student fees info with QR code
    public function FeesInfoWithQRCode(Request $request)
    {
        $school_code = $request->schoolCode;
        $invoiceId = $request->invoiceId;
        $studentId = $request->studentId;
        $school_info = SchoolInfo::where('school_code', $school_code)->first();
        $pay_slips = GeneratePayslip::where('school_code', $school_code)
            ->where('voucher_number', '#' . $invoiceId)
            ->get();
        $aggregateAmounts = GeneratePayslip::where('school_code', $school_code)
            ->where('voucher_number', '#' . $invoiceId)
            ->select('voucher_number', DB::raw('SUM(payable) as total_payable'), DB::raw('SUM(paid_amount) as total_paid'), DB::raw('SUM(amount) as total_amount'), DB::raw('SUM(waiver) as total_waiver'), DB::raw('SUM(due_amount) as total_due_amount'))
            ->groupBy('voucher_number')
            ->first();

        $studentInfo = Student::where('school_code', $school_code)
            ->where('student_id', $studentId)
            ->select('name', 'year', 'student_id', 'Class_name', 'group', 'section', 'student_roll')
            ->first();

        return view('Backend.Student_accounts.QRCodePaySlipInvoice', compact('pay_slips', 'aggregateAmounts', 'studentInfo', 'school_info'));
    }
}
