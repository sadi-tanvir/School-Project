<?php

namespace App\Http\Controllers\Backend\OnlineApplication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListOfApplicantController extends Controller
{
    public function ListOfApplicantView(Request $request, $school_code){
        return view("Backend.OnlineApplication.ListOfApplicant", compact("school_code"));
    }

    public function OnlineApplicationForm(Request $request, $school_code){
        return view("Backend.OnlineApplication.OnlineApplicationForm", compact("school_code"));
    }

    public function BlankApplicationForm(Request $request, $school_code){
        return view("Backend.OnlineApplication.BlankApplicationForm", compact("school_code"));
    }

    public function ReportApplicationView(Request $request, $school_code){
        return view("Backend.OnlineApplication.ReportApplication", compact("school_code"));
    }
}
