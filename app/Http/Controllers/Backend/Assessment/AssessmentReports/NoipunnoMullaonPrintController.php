<?php

namespace App\Http\Controllers\Backend\Assessment\AssessmentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoipunnoMullaonPrintController extends Controller
{
    public function NoipunnoMullaonPrintView()
    {
        return view("Backend.Assessment.AssessmentReports.NoipunnoMullaonPrint");
    }
}
