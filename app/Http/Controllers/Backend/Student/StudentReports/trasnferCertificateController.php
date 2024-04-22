<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class trasnferCertificateController extends Controller
{
    
    public function trasnfer_certificate($school_code)
    {
        return view('Backend.Student.students(report).transferCertificate');
    }
}
