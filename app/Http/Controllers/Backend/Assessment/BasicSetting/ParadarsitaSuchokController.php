<?php

namespace App\Http\Controllers\Backend\Assessment\BasicSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParadarsitaSuchokController extends Controller
{
    public function ParadarsitaSuchokView(){
        return view("Backend.Assessment.BasicSetting.ParadarsitaSuchok");
    }
}
