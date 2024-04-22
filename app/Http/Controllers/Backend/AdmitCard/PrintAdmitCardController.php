<?php

namespace App\Http\Controllers\Backend\AdmitCard;

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

class PrintAdmitCardController extends Controller
{
    public function printAdmitCard($schoolCode)
    {

        $classes = AddClass::where("action", "approved")->where("school_code", $schoolCode)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $schoolCode)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $schoolCode)->get();
        $studentId = Student::where("action", "approved")->where("school_code", $schoolCode)->get();
        $examName = AddClassExam::where("action", "approved")->where("school_code", $schoolCode)->get();
        $year = AddAcademicYear::where("action", "approved")->where("school_code", $schoolCode)->get();

        return view('Backend/AdmitCard/Report(admitCards)/printAdmitCard', compact('classes', 'sections', 'groups', 'studentId', 'examName', 'year'));
    }

    public function downloadAdmit(Request $request, $schoolCode)
    {
        $class = $request->class;
        $group = $request->group;
        $section_name = $request->section_name;
        $id = $request->id;
        $exam_name = $request->exam_name;
        $year = $request->year;
        $print_type = $request->print_type;
    
        // Check if any required parameter is null
        if ($class === null || $group === null || $section_name === null || $id === null || $exam_name === null || $year === null || $print_type === null) {
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
        $Data = Student::where('school_code', $schoolCode)
            ->where('class_name', $class)
            ->where('group', $group)
            ->where('student_id', $id)
            ->where('section', $section_name)
            ->get();
    
        // If no data found, redirect back with an error message
        if ($Data->isEmpty()) {
            return redirect()->route('printAdmitCard', $schoolCode)->with('error', 'Student data not found.');
        }
    
        // Fetch additional data required for the admit card
        $admit = AdmitInstruction::where('school_code', $schoolCode)->get();
        $headteacher = AddSignature::where('school_code', $schoolCode)
            ->where('sign', 'Headmaster')
            ->get();
            return view('Backend/AdmitCard/Report(admitCards)/downloadAdmitCard', compact('Data', 'exam_name', 'year', 'admit', 'headteacher','schoolCode'));

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
    


}
