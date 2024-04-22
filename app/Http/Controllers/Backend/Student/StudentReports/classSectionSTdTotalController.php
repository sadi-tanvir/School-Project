<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Student;

class classSectionSTdTotalController extends Controller
{
    //
    public function classSectionSTdTotal($school_code)
    {
        $classes = AddClass::where("action", "approved")->where("school_code", $school_code)->get();
        $year = AddAcademicYear::where("action", "approved")->where("school_code", $school_code)->get();
        return view('Backend.Student.students(report).classSectionSTdTotal', compact('classes', 'year'));
    }

    public function classSectionStdTotalDownloadpdf(Request $request, $schoolCode)
    {
        $class = $request->class;
        $year = $request->year;
        if ($class === null || $year === null) {
            return redirect()->back()->with([
                'error' => 'Please select all required parameters!',
                'class' => $class,
                'year' => $year,
            ]);
        }
        $Data = Student::where('school_code', $schoolCode)
            ->where('class_name', $class)
            ->get();
        if ($Data->isEmpty()) {
            return redirect()->route('classSectionSTdTotal', $schoolCode)->with('error', 'Student data not found.');
        }
        return view('Backend.Student.students(report).classSectionSTdTotalDownload', compact('Data', 'year', 'schoolCode'));
    }





    public function downloadPDF(Request $request, $schoolCode)
    {
        $class = $request->class;
        $year = $request->year;
        $Data = Student::where('school_code', $schoolCode)
            ->where('class_name', $class)
            ->get();
        $pdf = PDF::loadView('Backend.Student.students(report).pdf.classSectionStdtotalDownload', compact('Data', 'year',));
        return $pdf->download('student-class-section-total.pdf');
    }
}















  // $group = $request->group;
        // $section_name = $request->section_name;
        // $id = $request->id;
        // $exam_name = $request->exam_name;
        
            // ->where('group', $group)
            // ->where('student_id', $id)
            // ->where('section', $section_name)