<?php

namespace App\Http\Controllers\Backend\StudentAttendence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    // student attendence 
    public function add_student_attence($school_code)
    {
        return view('Backend.StudentAttendence.addStudentAttendence');
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
