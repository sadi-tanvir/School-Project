<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddClassWiseShift;
use App\Models\AddClassWiseSubject;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentProfileUpdateController extends Controller
{
    public function studentProfileUpdate($schoolCode){
        $student = null;
        $classes=AddClass::where("action", "approved")->where("school_code",$schoolCode)->get();
        $sections=AddSection::where("action", "approved")->where("school_code",$schoolCode)->get();
        $groups=AddGroup::where("action", "approved")->where("school_code",$schoolCode)->get();
        $sessions=AddAcademicSession::where("action", "approved")->where("school_code",$schoolCode)->get();
        $years=AddAcademicYear::where("action", "approved")->where("school_code",$schoolCode)->get();
        return view('Backend.Student.studentProfileUpdate',compact('classes','sections','groups','sessions','years','student'));
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
  
    public function subject(Request $request, $school_code)
    {
        $class = $request->class;
        $subjects = AddClassWiseSubject::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($subjects);
    }

    public function findData(Request $request, $schoolCode)
    {
        // dd($request);
        
        $student = [];
        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedYear = $request->input('year');
        $selectedSesion = $request->input('session');

        if($selectedClassName){
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->get();
        }
        else if($selectedGroupName){
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('group', $selectedGroupName)
            ->get();
        }
        elseif ($selectedSectionName) {
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('section', $selectedSectionName)
            ->get();
        }
        else if($selectedYear){
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('year', $selectedYear)
            ->get();
        }
        else{
            $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('group', $selectedGroupName)
            ->where('section', $selectedSectionName)
            ->where('year', $selectedYear)
            ->get();
        }


            $classes=AddClass::where("action", "approved")->where("school_code",$schoolCode)->get();
            $sections=AddSection::where("action", "approved")->where("school_code",$schoolCode)->get();
            $groups=AddGroup::where("action", "approved")->where("school_code",$schoolCode)->get();
            $sessions=AddAcademicSession::where("action", "approved")->where("school_code",$schoolCode)->get();
            $years=AddAcademicYear::where("action", "approved")->where("school_code",$schoolCode)->get();
          

        if ($student->isNotEmpty()) {
            return view('Backend.Student.studentProfileUpdate', compact('classes','sections','groups','sessions','years','student'))->with([
                'success' => 'Student found successfully!',
                'class_name' => $request->class_name,
                'group' => $request->group,
                'section' => $request->section,
                'year' => $request->year,
                'session' => $request->session,
            ]);
          
        }
            return redirect()->route('studentProfileUpdate',$schoolCode)->with('error','Student Data Not Found');
    }
}
