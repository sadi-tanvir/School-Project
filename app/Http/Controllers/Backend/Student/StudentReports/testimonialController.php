<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testimonialController extends Controller
{
    //
    public function testimonial($school_code)
    {
        return view('Backend.Student.students(report).testimonial');
    }
}
