<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class admissionSummaryController extends Controller
{
    //
    public function admission_summary($school_code)
    {
        $classes = AddClass::where("action", "approved")->where("school_code", $school_code)->get();
        $year = AddAcademicYear::where("action", "approved")->where("school_code", $school_code)->get();
        return view('Backend.Student.students(report).admissionSummary', compact('classes', 'year'));
    }
    

    public function addmission_summary_download(Request $request, $schoolCode)
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
        $Data = Student::where('school_code', $schoolCode)->where('class_name', $class)->get();
        if($Data->isEmpty()){
            // 
            return redirect()->route('admissionSummary', $schoolCode)->with('error', 'Student Data not Found');
        }
        // 
        return view('Backend.Student.students(report).admissionSummary', compact('Data', 'year', 'schoolCode'));
    }


    public function downloadAdmisionSummaryPdf(Request $request, $schoolCode){
        $class = $request->class;
        $year = $request->year;
        $Data = Student::where('school_code', $schoolCode)
            ->where('class_name', $class)
            ->get();
        $pdf = PDF::loadView('.pdf', compact('data' , 'year'));
        return $pdf->download('Backend.Student.students(report).pdf.admissionSummaryDownload');
    }    
    }


