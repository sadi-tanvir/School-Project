<?php

namespace App\Http\Controllers\Backend\Assessment\BasicSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParadarsitaSuchokExamController extends Controller
{
    public function ParadarsitaSuchokExamView()
    {
        return view("Backend.Assessment.BasicSetting.ParadarsitaSuchokExam");
    }
}
