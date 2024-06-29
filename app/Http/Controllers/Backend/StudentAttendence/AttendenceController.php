<?php

namespace App\Http\Controllers\Backend\StudentAttendence;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddGroup;
use App\Models\AddPeriod;
use App\Models\AddSection;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\StudentT;

class AttendenceController extends Controller
{
    // student attendence 
    public function add_student_attence($school_code)
    {
        $data=null;
        $classes = AddClass::where("action", "approved")->where("school_code", $school_code)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $school_code)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $school_code)->get();
        $years = AddAcademicYear::where("action", "approved")->where("school_code", $school_code)->get();
        $periods = AddPeriod::where("action", "approved")->where("school_code", $school_code)->get();
        return view('Backend.StudentAttendence.addStudentAttendence',compact('classes','sections','groups','years','periods','data'));
    }
    public function attendanceStudent(Request $request, $school_code)
    {
        $selectclass = $request->class;
        $selectsection = $request->section;
        $selectgroup = $request->group;
        $selectyear = $request->year;
        $selectperiod = $request->period;
        $selectdate = $request->date;
        $classes = AddClass::where("action", "approved")->where("school_code", $school_code)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $school_code)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $school_code)->get();
        $years = AddAcademicYear::where("action", "approved")->where("school_code", $school_code)->get();
        $periods = AddPeriod::where("action", "approved")->where("school_code", $school_code)->get();
        $data = Student::where('action', 'approved')
                       ->where('school_code', $school_code)
                       ->where('section', $selectsection)
                       ->where('Class_name', $selectclass)
                       ->where('group', $selectgroup)
                       ->where('year', $selectyear)
                       ->get();
    // dd($data);
        return view('Backend.StudentAttendence.addStudentAttendence',compact('classes','sections','groups','years','periods','data','selectclass','selectgroup','selectyear','selectperiod','selectdate','selectsection'));
    }

    public function storeAttendance(Request $request){
        dd($request);
    }
    
    // leave form
    public function student_leave_form($school_code)
    {
        return view('Backend.StudentAttendence.LeaveEntryForm');
    }

// leave type
    public function add_leave_type($school_code)
    {
        return view('Backend.StudentAttendence.addLeaveType');
    }
}
