<?php

namespace App\Http\Controllers\Backend\StudentAttendence;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassWiseSubject;
use App\Models\AddGroup;
use App\Models\AddPeriod;
use App\Models\AddSection;
use App\Models\AddSubject;
use App\Models\ManualAttendance;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\StudentT;
use Carbon\Carbon;

class AttendenceController extends Controller
{
    // student attendence 
    public function add_student_attence($school_code)
    {
        $data = null;
        $classes = AddClass::where("action", "approved")->where("school_code", $school_code)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $school_code)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $school_code)->get();
        $years = AddAcademicYear::where("action", "approved")->where("school_code", $school_code)->get();
        $periods = AddPeriod::where("action", "approved")->where("school_code", $school_code)->get();
        $subjects=AddSubject::where("action", "approved")->where("school_code", $school_code)->get();
        return view('Backend.StudentAttendence.addStudentAttendence', compact('classes', 'sections', 'groups', 'years', 'periods', 'data','subjects'));
    }

    public function attendanceStudent(Request $request, $school_code)
    {
        $selectclass = $request->class;
        $selectsection = $request->section;
        $selectgroup = $request->group;
        $selectyear = $request->year;
        $selectperiod = $request->period;
        $selectsubject = $request->subject;
        $selectdate = $request->date;
        $classes = AddClass::where("action", "approved")->where("school_code", $school_code)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $school_code)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $school_code)->get();
        $years = AddAcademicYear::where("action", "approved")->where("school_code", $school_code)->get();
        $periods = AddPeriod::where("action", "approved")->where("school_code", $school_code)->get();
        $subjects=AddSubject::where("action", "approved")->where("school_code", $school_code)->get();
        $attendData = ManualAttendance::where('action', 'approved')
        ->where('school_code', $school_code)
        ->where('section', $selectsection)
        ->where('class', $selectclass)
        ->where('group', $selectgroup)
        ->where('date', $selectdate)
        ->exists();

        $data = Student::where('action', 'approved')
        ->where('school_code', $school_code)
        ->where('section', $selectsection)
        ->where('Class_name', $selectclass)
        ->where('group', $selectgroup)
        ->where('year', $selectyear)
        ->get();
        
        
        if($selectsubject==null){

                    if($attendData){
                    $attendData = ManualAttendance::where('action', 'approved')
                        ->where('school_code', $school_code)
                        ->where('section', $selectsection)
                        ->where('class', $selectclass)
                        ->where('group', $selectgroup)
                        ->where('period', $selectperiod)
                        ->where('date', $selectdate)
                        ->get();
        }
                else {
        
                    $data = Student::where('action', 'approved')
                        ->where('school_code', $school_code)
                        ->where('section', $selectsection)
                        ->where('Class_name', $selectclass)
                        ->where('group', $selectgroup)
                        ->where('year', $selectyear)
                        ->get();
                 }
        }
        else{

            if($attendData){
            $attendData = ManualAttendance::where('action', 'approved')
                        ->where('school_code', $school_code)
                        ->where('section', $selectsection)
                        ->where('class', $selectclass)
                        ->where('group', $selectgroup)
                        ->where('period', $selectperiod)
                        ->where('date', $selectdate)
                        ->get();
            } else {
        
                    $data = Student::where('action', 'approved')
                        ->where('school_code', $school_code)
                        ->where('section', $selectsection)
                        ->where('Class_name', $selectclass)
                        ->where('group', $selectgroup)
                        ->where('year', $selectyear)
                        ->get();
        }
    }
       
        return view('Backend.StudentAttendence.addStudentAttendence', compact('classes', 'sections', 'groups', 'years', 'periods', 'data','subjects', 'selectclass', 'selectgroup', 'selectyear', 'selectperiod', 'selectdate', 'selectsection','attendData','selectsubject'));
    }

    public function storeAttendance(Request $request, $school_code)
{
    $selectclass = $request->class;
    $selectsection = $request->section;
    $selectgroup = $request->group;
    $selectyear = $request->year;
    $selectperiod = $request->period;
    $selectsubject = $request->subject;
    $selectdate = $request->date;
    $key = $request->input('key');

    foreach ($key as $id) {
        $attendanceQuery = ManualAttendance::where('action', 'approved')
            ->where('school_code', $school_code)
            ->where('section', $selectsection)
            ->where('class', $selectclass)
            ->where('group', $selectgroup)
            ->where('period', $selectperiod)
            ->where('subject', $selectsubject)
            ->where('date', $selectdate)
            ->where('student_id', $request->student_id[$id])
            ->where('student_roll', $request->student_roll[$id]);
        if ($attendanceQuery->exists()) {
            $attendanceQuery->update([
                'student_status' => $request->attendance[$id] ?? null ,
                'sms' => $request->sms[$id] ?? null  // Handling case where 'sms' might not be present
            ]);
            
        } else {
            $attendance = new ManualAttendance();
            $attendance->name = $request->name[$id];
            $attendance->student_id = $request->student_id[$id];
            $attendance->student_roll = $request->student_roll[$id];
            $attendance->class = $selectclass;
            $attendance->section = $selectsection;
            $attendance->group = $selectgroup;
            $attendance->year = $selectyear;
            $attendance->period = $selectperiod;
            $attendance->subject = $selectsubject;
            $attendance->date = $selectdate;
            $attendance->status = $request->status[$id] ?? null;  // Handling case where 'status' might not be present
            $attendance->student_status = $request->attendance[$id] ?? null ;
            $attendance->sms = $request->sms[$id] ?? null;
            $attendance->action = 'approved';
            $attendance->school_code = $school_code;

            // Save the new record
            $attendance->save();
           
        }
      
        
    }
    return redirect()->back()->with('success','successfully added');
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

    public function getSubject(Request $request, $school_code)
    {
        $class = $request->class;

        $subjects = AddClassWiseSubject::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($subjects);
    }

}
