<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class trasnferCertificateListController extends Controller
{
    //
    public function trasnfer_certificate_list($school_code)
    {
        return view('Backend.Student.students(report).transferCertifiateList');
    }
}
