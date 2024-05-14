<?php

namespace App\Http\Controllers\Backend\Assessment\AssessmentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllSubjectWiseController extends Controller
{
    public function AllSubjectWiseView()
    {
        return view("Backend.Assessment.AssessmentReports.AllSubjectWise");
    }
}
