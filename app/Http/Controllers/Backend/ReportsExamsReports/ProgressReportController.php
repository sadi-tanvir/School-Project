<?php

namespace App\Http\Controllers\Backend\ReportsExamsReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgressReportController extends Controller
{
    public function progressReport($school_code)
    {
        return view('/Backend/Report(exam&result)/progressReport');
    }
    public function downloadProgressReport($school_code)
    {
        return view('/Backend/Report(exam&result)/downloadProgressReport');
    }
}
