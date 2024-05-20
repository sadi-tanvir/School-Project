<?php

namespace App\Http\Controllers\Backend\Assessment\AssessmentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoipunnoReportController extends Controller
{
    public function NoipunnoReportView()
    {
        return view("Backend.Assessment.AssessmentReports.NoipunnoReport");
    }
}
