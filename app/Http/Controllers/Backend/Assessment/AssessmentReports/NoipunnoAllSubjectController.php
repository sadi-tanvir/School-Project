<?php

namespace App\Http\Controllers\Backend\Assessment\AssessmentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoipunnoAllSubjectController extends Controller
{
    public function NoipunnoAllSubjectView()
    {
        return view("Backend.Assessment.AssessmentReports.NoipunnoAllSubject");
    }
}
