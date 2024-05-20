<?php

namespace App\Http\Controllers\Backend\Assessment\BasicSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParadarsitaSuchokExcelController extends Controller
{
    public function ParadarsitaSuchokExcelView(){
        return view("Backend.Assessment.BasicSetting.ParadarsitaSuchokExcel");
    }
}
