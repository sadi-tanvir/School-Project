<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    //
    public function student_profile($school_code)
    {
        return view('Backend.Student.students(report).studentProfile');
    }
}
