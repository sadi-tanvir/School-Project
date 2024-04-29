<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassWiseSection;
use App\Models\AddSection;
use App\Models\SchoolInfo;
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
        $year=$request->year;
        //dd($year);
        $classes=AddClass::where('action', 'approved')->where('school_code',$schoolCode)->get();
        $sections=AddClassWiseSection::where('action', 'approved')->where('school_code',$schoolCode)->get();
        $students=Student::where('action', 'approved')->where('school_code',$schoolCode)->where('year',$year)->get();
        $schoolInfo=SchoolInfo::where('school_code',$schoolCode)->get();
        $date = date('d-m-Y');
        return view('Backend.Student.students(report).classSectionSTdTotalDownload', compact( 'class','classes','sections','students','schoolInfo','date'));
    }





    public function downloadPDF(Request $request, $schoolCode)
    {
        $class = $request->class;
        $year=$request->year;
        //dd($year);
        $classes=AddClass::where('action', 'approved')->where('school_code',$schoolCode)->get();
        $sections=AddClassWiseSection::where('action', 'approved')->where('school_code',$schoolCode)->get();
        $students=Student::where('action', 'approved')->where('school_code',$schoolCode)->where('year',$year)->get();
        $schoolInfo=SchoolInfo::where('school_code',$schoolCode)->get();
        $date = date('d-m-Y');
        $pdf = PDF::loadView('Backend.Student.students(report).pdf.classSectionStdtotalDownload', compact( 'class','classes','sections','students','schoolInfo','date'));
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