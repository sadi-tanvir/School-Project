<?php

namespace App\Http\Controllers\Backend\STudent\StudentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiblingsReportController extends Controller
{
    public function siblings(Request $request,$school_code){
        return view ('Backend.Student.students(report).siblingsReport');
    }
}
