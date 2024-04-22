<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class studentIdCardController extends Controller
{
    //
    public function student_id_card($school_code)
    {
        return view('Backend.Student.students(report).studentIdCard');
    }
}
