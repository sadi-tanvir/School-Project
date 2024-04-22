<?php

namespace App\Http\Controllers\Backend\AdmitCard;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClassExam;
use App\Models\Student;
use App\Models\AddClass;
use App\Models\AddSection;
use App\Models\AddGroup;
use Illuminate\Http\Request;

class PrintSeatPlanController extends Controller
{
    public function printSeatPlan($schoolCode){
        
        $classes=AddClass::where("action", "approved")->where("school_code",$schoolCode)->get();
        $sections=AddSection::where("action", "approved")->where("school_code",$schoolCode)->get();
        $groups=AddGroup::where("action", "approved")->where("school_code",$schoolCode)->get();
        $studentId=Student::where("action", "approved")->where("school_code",$schoolCode)->get();
        $examName=AddClassExam::where("action", "approved")->where("school_code",$schoolCode)->get();
        $year=AddAcademicYear::where("action", "approved")->where("school_code",$schoolCode)->get();
       
        return view('Backend/AdmitCard/Report(admitcards)/printSeatPlan',compact('classes','sections','groups','studentId','examName','year'));
    }
}
