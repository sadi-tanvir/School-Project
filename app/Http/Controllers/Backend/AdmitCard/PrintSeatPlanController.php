<?php

namespace App\Http\Controllers\Backend\AdmitCard;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClassExam;
use App\Models\SchoolInfo;
use App\Models\Student;
use App\Models\AddClass;
use App\Models\AddSection;
use App\Models\AddGroup;
use Illuminate\Http\Request;

class PrintSeatPlanController extends Controller
{
    public function printSeatPlan($schoolCode)
    {

        $classes = AddClass::where("action", "approved")->where("school_code", $schoolCode)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $schoolCode)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $schoolCode)->get();
        $studentId = Student::where("action", "approved")->where("school_code", $schoolCode)->get();
        $examName = AddClassExam::where("action", "approved")->where("school_code", $schoolCode)->get();
        $year = AddAcademicYear::where("action", "approved")->where("school_code", $schoolCode)->get();

        return view('Backend/AdmitCard/printSeatPlan', compact('classes', 'sections', 'groups', 'studentId', 'examName', 'year'));
    }
    public function downloadPrint(Request $request, $schoolCode)
    {
        //dd($request);

        $class = $request->class;
        $group = $request->group;
        $section_name = $request->section_name;
        $id = $request->id;
        $exam_name = $request->exam_name;
        $year = $request->year;



        // Check if any required parameter is null
        if ($class === null || $group === null || $section_name === null || $exam_name === null || $year === null) {
            return redirect()->route('printAdmitCard', $schoolCode)->with([
                'error' => 'Please select all required parameters!',
                'class' => $class,
                'group' => $group,
                'section_name' => $section_name,
                'id' => $id,
                'exam_name' => $exam_name,
                'year' => $year,

            ]);
        }
        $Data = [];
        if ($id == null) {
            $Data = Student::where('school_code', $schoolCode)
                ->where('class_name', $class)
                ->where('group', $group)
                ->where('section', $section_name)
                ->get();
            //dd($Data);
        }
        // Check if student data exists based on the provided parameters
        else {
            $Data = Student::where('school_code', $schoolCode)
                ->where('class_name', $class)
                ->where('group', $group)
                ->where('student_id', $id)
                ->where('section', $section_name)
                ->get();
        }
        //dd($Data);
        // If no data found, redirect back with an error message
        if ($Data->isEmpty()) {
            return redirect()->route('printSeatPlan', $schoolCode)->with('error', 'Student data not found.');
        }


        // dd($signPosition);
        $school_info = SchoolInfo::where('school_code', $schoolCode)->first();
        $date = Date('d-m-Y');



        return view('Backend/AdmitCard/Report(admitCards)/downloadSeatPlan', compact('Data', 'exam_name', 'year', 'schoolCode', 'school_info', 'date', ));

    }

}
