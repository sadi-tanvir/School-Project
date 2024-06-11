<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddClassWiseShift;
use App\Models\AddGroup;
use App\Models\AddPaySlip;
use App\Models\AddSection;
use App\Models\AddShift;
use App\Models\GeneratePayslip;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class StudentController extends Controller
{
    public function AddStudentForm($schoolCode)
    {
        // $school_code=100;
        $studentId = $this->generateUniqueStudentId();
        $classes = AddClass::where("action", "approved")->where("school_code", $schoolCode)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $schoolCode)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $schoolCode)->get();
        $shifts = AddShift::where("action", "approved")->where("school_code", $schoolCode)->get();
        $sessions = AddAcademicSession::where("action", "approved")->where("school_code", $schoolCode)->get();
        $years = AddAcademicYear::where("action", "approved")->where("school_code", $schoolCode)->get();
        $categories = AddCategory::where("action", "approved")->where("school_code", $schoolCode)->get();
        return view("Backend.Student.addStudent", compact("studentId", "classes", "sections", "groups", "shifts", "sessions", "years", "categories"));
    }
    public function getGroups(Request $request, $school_code)
    {
        $class = $request->class;

        $groups = AddClassWiseGroup::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($groups);
    }

    public function getSections(Request $request, $school_code)
    {
        $class = $request->class;
        $sections = AddClassWiseSection::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($sections);
    }

    public function getShifts(Request $request, $school_code)
    {
        $class = $request->class;
        $shifts = AddClassWiseShift::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($shifts);
    }
    public function addStudent(Request $request)
    {
        $request->validate([
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->move('images/student', $request->input('nedubd_student_id') . '_' . uniqid() . '.' . $request->file('image')->extension());
            $studentImage = 'images/student/' . basename($imagePath);
        }


        $isExist = Student::where('school_code', $request->input('school_code'))->where('action', 'approved')->where('student_id', $request->input('student_id'))->exists();

        if ($isExist) {
            return redirect()->back()->with('error', 'This Student already exists.');
        }


        $student = new Student();
        $student->name = $request->input('name');
        $student->birth_date = $request->input('birth_date');
        $student->nedubd_student_id = $request->input('nedubd_student_id');
        $student->student_id = $request->input('student_id') ?? $this->generateUniqueStudentId();
        $student->student_roll = $request->input('student_roll');
        $student->Class_name = $request->input('class_name');
        $student->group = $request->input('group');
        $student->section = $request->input('section');
        $student->shift = $request->input('shift');
        $student->category = $request->input('category');
        $student->year = $request->input('year');
        $student->gender = $request->input('gender');
        $student->religious = $request->input('religious');
        $student->nationality = $request->input('nationality');
        $student->blood_group = $request->input('blood_group');
        $student->session = $request->input('session');
        $student->status = $request->input('status');
        $student->image = $studentImage ?? null;
        $student->admission_date = $request->input('admission_date');
        $student->mobile_no = $request->input('mobile_no');
        $student->father_name = $request->input('father_name');
        $student->father_mobile = $request->input('father_mobile');
        $student->father_occupation = $request->input('father_occupation');
        $student->father_nid = $request->input('father_nid');
        $student->father_birth_date = $request->input('father_birth_date');
        $student->mother_name = $request->input('mother_name');
        $student->mother_number = $request->input('mother_number');
        $student->mother_occupation = $request->input('mother_occupation');
        $student->mother_nid = $request->input('mother_nid');
        $student->mother_birth_date = $request->input('mother_birth_date');
        $student->mother_income = $request->input('mother_income');
        $student->present_village = $request->input('present_village');
        $student->present_post_office = $request->input('present_post_office');
        $student->present_country = $request->input('present_country');
        $student->present_zip_code = $request->input('present_zip_code');
        $student->present_district = $request->input('present_district');
        $student->present_police_station = $request->input('present_police_station');
        $student->parmanent_village = $request->input('parmanent_village');
        $student->parmanent_post_office = $request->input('parmanent_post_office');
        $student->parmanent_country = $request->input('parmanent_country');
        $student->parmanent_zip_code = $request->input('parmanent_zip_code');
        $student->parmanent_district = $request->input('parmanent_district');
        $student->parmanent_police_station = $request->input('parmanent_police_station');
        $student->guardian_name = $request->input('guardian_name');
        $student->guardian_address = $request->input('guardian_address');
        $student->last_school_name = $request->input('last_school_name');
        $student->last_class_name = $request->input('last_class_name');
        $student->last_result = $request->input('last_result');
        $student->last_passing_year = $request->input('last_passing_year');
        $student->email = $request->input('email');
        $student->password = Hash::make($request->input('password') ?? '12345');
        $student->role = 'student';
        $student->school_code = $request->input('school_code');
        $student->action = $request->input('action');
        $student->save();

        // add student fees
        $add_related_fees = $request->input("add_related_fees");
        if (isset($add_related_fees)) {
            $payslipInfo = AddPaySlip::where('school_code', $request->input('school_code'))
                ->where('class_name', 'play')
                ->where('group_name', 'N/A')
                ->select('class_name', 'group_name', 'pay_slip_type', DB::raw('SUM(fees_amount) as totalFeesAmount'))
                ->groupBy('class_name', 'group_name', 'pay_slip_type')
                ->get();

            return view('Backend.Student.NewAdmissionFeeGenerate', compact('payslipInfo', 'student'))->with('success', 'student added successfully!');
        } else {
            return redirect()->back()->with('success', 'student added successfully!');
        }
    }

    function PrintAdmissionInvoice(Request $request, $student_id, $school_code)
    {
        $date = now();
        $studentInfo = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('id', $student_id)
            ->select('student_id', 'name', 'Class_name', 'group', 'section', 'session')
            ->first();

        return view('Backend.Student.AdmissionConfirmInvoice', compact('date', 'studentInfo'));
    }


    public function generateQrCode($school_code, $studentId, $invoiceId)
    {
        $appUrl = env('APP_URL');
        $invoice = explode('#', $invoiceId);
        $invoiceId = $invoice[1];
        $qrCode = QrCode::size(60)->generate($appUrl . '/' . 'student-fees-info/' . $school_code . '/' . $studentId . '/' . $invoiceId);
        return $qrCode;
    }

    // genearate & pay student fees

    public function addNewStudentFees(Request $request, $school_code)
    {
        $selectedPayslips = $request->input('select_payslip', []);
        $months = $request->input('month_', []);
        $amount = $request->input('amount', []);
        $last_pay_date = $request->input('last_pay_date');
        $student_id = $request->input('student_id');
        $class = $request->input('class');
        $group = $request->input('group');
        $section = $request->input('section');
        $waiver = $request->input('waiver');

        $pay_now = $request->input('pay_now');

        $classPosition = AddClass::where('school_code', $school_code)
            ->where('class_name', $class)
            ->select('position')
            ->first();

        // generate payslip
        foreach ($selectedPayslips as $pay_slip_type => $value) {
            GeneratePayslip::firstOrCreate(
                [
                    'school_code' => $school_code,
                    'action' => 'approved',
                    'student_id' => $student_id,
                    'month' => $months[$pay_slip_type],
                    'year' => date('Y'),
                    'class' => $class,
                    'pay_slip_type' => $pay_slip_type,
                ],
                [
                    'class_position' => $classPosition->position,
                    'last_pay_date' => $last_pay_date,
                    'group' => $group,
                    'section' => $section,
                    'amount' => $amount[$pay_slip_type],
                    'waiver' => $waiver[$pay_slip_type] ?? 0,
                    'payable' => $amount[$pay_slip_type] - $waiver[$pay_slip_type] ?? 0,
                ]
            );
        }


        // pay fees
        if ($pay_now) {
            $date = now();
            // create a uniqe voucher number
            $voucerNumber = Str::upper('#V' . uniqid());

            // generate QR-Code
            $qrcode = $this->generateQrCode($school_code, $student_id, $voucerNumber);


            $collected_by_name = $request->input('collected_by_name');
            $collected_by_email = $request->input('collected_by_email');
            $collected_by_phone = $request->input('collected_by_phone');
            $collection_date = $request->input('collection_date');

            // get student informaion
            $studentInfo = Student::where('school_code', $school_code)
                ->where('action', 'approved')
                ->where('student_id', $student_id)
                ->select('student_id', 'name', 'Class_name', 'group', 'section', 'session', 'year', 'student_roll')
                ->first();

            // get all payslip of the student
            $generatedPayslip = GeneratePayslip::where('school_code', $school_code)
                ->where('student_id', $student_id)
                ->where('payment_status', 'unpaid')
                ->get();

            $payslipInfoForInvoice = [];
            $totalPayableAmount = $generatedPayslip->sum('payable');
            $totalWaiver = $generatedPayslip->sum('waiver');
            $totalPaidAmount = $totalPayableAmount - $totalWaiver;

            // update payslip
            foreach ($generatedPayslip as $payslip) {
                $updatePaylip = GeneratePayslip::where('school_code', $school_code)
                    ->where('student_id', $student_id)
                    ->where('id', $payslip->id)
                    ->update([
                        "payable" => 0,
                        "voucher_number" => $voucerNumber,
                        "collect_date" => $collection_date,
                        "due_amount" => 0,
                        "paid_amount" => $payslip->payable,
                        "note" => $payslip->month . ' ' . $payslip->year . ' ' . $payslip->pay_slip_type,
                        "collected_by_name" => $collected_by_name,
                        "collected_by_email" => $collected_by_email,
                        "collected_by_phone" => $collected_by_phone,
                        "payment_status" => 'paid',
                    ]);

                // add payslip info for invoice
                $payslipInfoForInvoice[] = [
                    'month' => $payslip->month,
                    'year' => $payslip->year,
                    'pay_slip_type' => $payslip->pay_slip_type,
                    'amount' => $payslip->payable,
                    'waiver' => $payslip->waiver,
                    'payable' => $payslip->payable - $payslip->waiver,
                    'note' => $payslip->pay_slip_type . ' - ' . $payslip->month . ' ' . $payslip->year
                ];
            }

            return view(
                'Backend.Student.InstantPaymentInvoice',
                compact(
                    'qrcode',
                    'studentInfo',
                    'date',
                    'voucerNumber',
                    'collected_by_name',
                    'collection_date',
                    'totalPayableAmount',
                    'totalWaiver',
                    'totalPaidAmount',
                    'payslipInfoForInvoice'
                )
            );
        }


        return redirect()->back()->with('success', 'Fees added successfully!');
    }

    private function generateUniqueStudentId()
    {
        $lastStudent = Student::latest()->first();
        $currentYear = date('Y');
        $newId = 1;

        if ($lastStudent) {
            $lastId = intval(substr($lastStudent->nedubd_student_id, -4));
            $newId = $lastId + 1;
        }

        $newStudentId = 'STU' . $currentYear . str_pad($newId, 4, '0', STR_PAD_LEFT);

        $existingStudent = Student::where('nedubd_student_id', $newStudentId)->first();
        if ($existingStudent) {
            do {
                $newId++;
                $newStudentId = 'STU' . $currentYear . str_pad($newId, 4, '0', STR_PAD_LEFT);
                $existingStudent = Student::where('nedubd_student_id', $newStudentId)->first();
            } while ($existingStudent);
        }

        return $newStudentId;
    }


    public function updateStudentBasicInfo()
    {
        return view('Backend.Student.updateStudentBasicInfo');
    }
}
