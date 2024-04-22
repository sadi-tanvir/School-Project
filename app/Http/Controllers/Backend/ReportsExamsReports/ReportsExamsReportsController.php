<?php

namespace App\Http\Controllers\Backend\ReportsExamsReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsExamsReportsController extends Controller
{
    public function progressReport($school_code){
        return view('/Backend/Report(exam&result)/progressReport');
    }
    public function failList1($school_code){
        return view('/Backend/Report(exam&result)/failList');
    }
    public function format1($school_code){
        return view('/Backend/Report(exam&result)/format1');
    }
    public function format2($school_code){
        return view('/Backend/Report(exam&result)/format2');
    }
    public function format3($school_code){
        return view('/Backend/Report(exam&result)/format3');
    }
    public function gradeInfo($school_code){
        return view('/Backend/Report(exam&result)/gradeInfo');
    }
    public function grandFinal($school_code){
        return view('/Backend/Report(exam&result)/grandFinal');
    }
    public function meritClass($school_code){
        return view('/Backend/Report(exam&result)/meritClass');
    }
    public function meritList($school_code){
        return view('/Backend/Report(exam&result)/meritList');
    }
    public function passFailPercentage($school_code){
        return view('/Backend/Report(exam&result)/passFailPercentage');
    }
  
    public function unassignedSubject($school_code){
        return view('/Backend/Report(exam&result)/unassignedSubject');
    }
}
