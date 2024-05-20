<?php

namespace App\Http\Controllers\Backend\Assessment\AssessmentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoipunnoBIController extends Controller
{
    public function NoipunnoBIView()
    {
        return view("Backend.Assessment.AssessmentReports.NoipunnoBI");
    }
}
