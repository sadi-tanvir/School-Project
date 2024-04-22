<?php

namespace App\Http\Controllers\Backend\ReportStudentAttendence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportStudentAttendenceController extends Controller
{
    //
    public function attendence_report($school_code)
    {
        return view('Backend.ReportStudentAttendence.attendenceReport');
    }



    public function attendence_blank_report($school_code)
    {
        return view('Backend.ReportStudentAttendence.attendenceBlankReport');
    }

    public function date_wise_report($school_code)
    {
        return view('Backend.ReportStudentAttendence.dateWiseReport');
    }

    public function list_of_leave_report($school_code)
    {
        return view('Backend.ReportStudentAttendence.listOfLeaveReports');
    }

    public function section_wise_report($school_code)
    {
        return view('Backend.ReportStudentAttendence.sectionWiseSummary');
    }
}
