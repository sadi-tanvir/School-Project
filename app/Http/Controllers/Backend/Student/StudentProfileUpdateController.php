<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
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

    public function findData(Request $request, $schoolCode)
    {
        
        $student = null;
        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedYear = $request->input('year');
        $selectedSesion = $request->input('session');



        $student = Student::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('class_name', $selectedClassName)
            ->where('group', $selectedGroupName)
            ->where('section', $selectedSectionName)
            ->where('year', $selectedYear)
            ->get();
            $classes=AddClass::where("action", "approved")->where("school_code",$schoolCode)->get();
            $sections=AddSection::where("action", "approved")->where("school_code",$schoolCode)->get();
            $groups=AddGroup::where("action", "approved")->where("school_code",$schoolCode)->get();
            $sessions=AddAcademicSession::where("action", "approved")->where("school_code",$schoolCode)->get();
            $years=AddAcademicYear::where("action", "approved")->where("school_code",$schoolCode)->get();
           // dd($student);

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
