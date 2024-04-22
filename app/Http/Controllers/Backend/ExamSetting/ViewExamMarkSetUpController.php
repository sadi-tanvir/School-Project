<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewExamMarkSetUpController extends Controller
{
    public function viewExamMarkSetup(){
        
        return view ('Backend/BasicInfo/ExamSetting/viewExamMarkSetUp');
    }
}
