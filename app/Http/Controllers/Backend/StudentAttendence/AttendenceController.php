<?php

namespace App\Http\Controllers\Backend\StudentAttendence;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddGroup;
use App\Models\AddPeriod;
use App\Models\AddSection;
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
        return view('Backend.StudentAttendence.addStudentAttendence', compact('classes', 'sections', 'groups', 'years', 'periods', 'data'));
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
        $data = ManualAttendance::where("action", "approved")
            ->where('school_code', $school_code)
            ->where('section', $selectsection)
            ->where('class', $selectclass)
            ->where('group', $selectgroup)
            ->where('period', $selectperiod)
            ->where('date', $selectdate)
            ->exists();
        //dd($data);
        if ($data) {
            //dd($data);
            $data = ManualAttendance::where('action', 'approved')
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
        // dd($data);
        return view('Backend.StudentAttendence.addStudentAttendence', compact('classes', 'sections', 'groups', 'years', 'periods', 'data', 'selectclass', 'selectgroup', 'selectyear', 'selectperiod', 'selectdate', 'selectsection'));
    }

    public function storeAttendance(Request $request, $school_code)
{
    $selectclass = $request->class;
    $selectsection = $request->section;
    $selectgroup = $request->group;
    $selectyear = $request->year;
    $selectperiod = $request->period;
    $selectdate = $request->date;
    $key = $request->input('key');

    foreach ($key as $id) {
        $attendanceQuery = ManualAttendance::where('action', 'approved')
            ->where('school_code', $school_code)
            ->where('section', $selectsection)
            ->where('class', $selectclass)
            ->where('group', $selectgroup)
            ->where('period', $selectperiod)
            ->where('date', $selectdate)
            ->where('student_id', $request->student_id[$id])
            ->where('student_roll', $request->student_roll[$id]);

        if ($attendanceQuery->exists()) {
            $attendanceQuery->update([
                'student_status' => $request->attendance[$id],
                'sms' => $request->sms[$id] ?? null  // Handling case where 'sms' might not be present
            ]);
            return redirect()->back()->with('success','successfully updated');
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
            $attendance->date = $selectdate;
            $attendance->status = $request->status[$id] ?? null;  // Handling case where 'status' might not be present
            $attendance->student_status = $request->attendance[$id];
            $attendance->sms = $request->sms[$id] ?? null;
            $attendance->action = 'approved';
            $attendance->school_code = $school_code;

            // Save the new record
            $attendance->save();
            return redirect()->back()->with('success','successfully added');
        }
        
    }
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
