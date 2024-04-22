<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class religionWiseStudentSummaryController extends Controller
{
    //
    public function religion_wise_student_summary($school_code)
    {
        return view('Backend.Student.students(report).religionWiseStudentSummary');
    }
}
