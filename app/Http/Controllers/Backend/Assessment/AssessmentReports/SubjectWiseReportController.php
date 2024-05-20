<?php

namespace App\Http\Controllers\Backend\Assessment\AssessmentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectWiseReportController extends Controller
{
    public function SubjectWiseReportView()
    {
        return view("Backend.Assessment.AssessmentReports.SubjectWiseReport");
    }
}
