<?php

namespace App\Http\Controllers\Backend\AdmitCard;

use App\Models\AddAdmitCard;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddReportName;
use App\Models\SchoolInfo;
use App\Models\SetSignature;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClassExam;
use App\Models\AddSignature;
use App\Models\AdmitInstruction;
use App\Models\ExamPublish;
use App\Models\Student;
use App\Models\AddClass;
use App\Models\AddSection;
use App\Models\AddGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PrintAdmitCardController extends Controller
{
    public function printAdmitCard($schoolCode)
    {

        $classes = AddClass::where("action", "approved")->where("school_code", $schoolCode)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $schoolCode)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $schoolCode)->get();
        $studentId = Student::where("action", "approved")->where("school_code", $schoolCode)->get();
        $examName = AddClassExam::where("action", "approved")->where("school_code", $schoolCode)->get();
        $years = AddAcademicYear::where("action", "approved")->where("school_code", $schoolCode)->get();
        $reports = AddReportName::where("action", "approved")->where("school_code", $schoolCode)->get();

        return view('Backend/AdmitCard/Report(admitCards)/printAdmitCard', compact('classes', 'sections', 'groups', 'studentId', 'examName', 'years', 'reports'));
    }
    public function getStudentIds(Request $request, $school_code)
    {
        $className = $request->class;
        $groupName = $request->group;
        $sectionName = $request->section;
        $studentIds = Student::where('school_code', $school_code)
            ->where('class_name', $className)
            ->where('group', $groupName)
            ->where('section', $sectionName)
            ->pluck('student_id');
        return response()->json($studentIds);
    }
    

    public function downloadAdmit(Request $request, $schoolCode)
    {
        
        $admit = null;
        $subject = null;
        $class = $request->class;
        $group = $request->group;
        $section_name = $request->section_name;
        $id = $request->id;
        $exam_name = $request->exam_name;
        $year = $request->year;
        $print_type = $request->print_type;
        $report_name = $request->report_name;


        // Check if any required parameter is null
        if ($class === null || $group === null || $section_name === null || $exam_name === null || $year === null || $print_type === null) {
            return redirect()->route('printAdmitCard', $schoolCode)->with([
                'error' => 'Please select all required parameters!',
                'class' => $class,
                'group' => $group,
                'section_name' => $section_name,
                'id' => $id,
                'exam_name' => $exam_name,
                'year' => $year,
                'print_type' => $print_type,
            ]);
        }

        // Check if student data exists based on the provided parameters
        if($id==null){
            $Datas = Student::where('school_code', $schoolCode)
            ->where('class_name', $class)
            ->where('group', $group)
            ->where('section', $section_name)
            ->get();
        }

       else{
        $Datas = Student::where('school_code', $schoolCode)
        ->where('class_name', $class)
        ->where('group', $group)
        ->where('student_id', $id)
        ->where('section', $section_name)
        ->get();
       }

        // If no data found, redirect back with an error message
        if ($Datas->isEmpty()) {
            return redirect()->route('printAdmitCard', $schoolCode)->with('error', 'Student data not found.');
        }

        $signatures = AddSignature::where('school_code', $schoolCode)->where('action', 'approved')->get();
        $setSignature = SetSignature::where('school_code', $schoolCode)->where('status', 'active')->where('report_name', 'Admit Card')->get();

        // dd($signPosition);
        $school_info = SchoolInfo::where('school_code', $schoolCode)->first();
        $date = Date('d-m-Y');

        if ($print_type == "1") {
            $admit = AdmitInstruction::where('school_code', $schoolCode)->get();
            $subject = AddAdmitCard::where('school_code', $schoolCode)->where("action", "approved")->where('class_name', $class)->where('group_name', $group)->where('class_exam_name', $exam_name)->where('year', $year)->get();
            return view('Backend/AdmitCard/Report(admitCards)/downloadAdmitCard', compact('Datas', 'exam_name', 'year', 'admit', 'schoolCode', 'subject', 'school_info', 'date', 'signatures', 'setSignature'));
        }

        return view('Backend/AdmitCard/Report(admitCards)/downloadAdmitCard', compact('Datas', 'exam_name', 'year', 'admit', 'schoolCode', 'subject', 'school_info', 'date', 'signatures', 'setSignature'));

    }
    public function downloadPDF(Request $request, $schoolCode)
    {
        $class = $request->class;
        $group = $request->group;
        $section_name = $request->section_name;
        $id = $request->id;
        $exam_name = $request->exam_name;
        $year = $request->year;

        $Data = Student::where('school_code', $schoolCode)
            ->where('class_name', $class)
            ->where('group', $group)
            ->where('student_id', $id)
            ->where('section', $section_name)
            ->get();

        $admit = AdmitInstruction::where('school_code', $schoolCode)->get();
        $headteacher = AddSignature::where('school_code', $schoolCode)
            ->where('sign', 'Headmaster')
            ->get();

        $pdf = PDF::loadView('Backend.AdmitCard.pdf.downloadAdmitCard', compact('Data', 'exam_name', 'year', 'admit', 'headteacher'));

        return $pdf->download('admit-card.pdf');
    }

    public function printGroups(Request $request, $school_code)
    {
        $class = $request->class;

        $groups = AddClassWiseGroup::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($groups);
    }

    public function printSections(Request $request, $school_code)
    {
        $class = $request->class;
        $sections = AddClassWiseSection::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($sections);
    }

}
