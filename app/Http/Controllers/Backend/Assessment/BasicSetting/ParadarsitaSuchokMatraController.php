<?php

namespace App\Http\Controllers\Backend\Assessment\BasicSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParadarsitaSuchokMatraController extends Controller
{
    public function ParadarsitaSuchokMatraView(){
        return view("Backend.Assessment.BasicSetting.ParadarsitaSuchokMatra");
    }
}
