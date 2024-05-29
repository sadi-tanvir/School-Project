<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EsifListController extends Controller
{
    public function e_sifList($school_code){
        return view('Backend.Student.students(report).e-SIFList');
    }
}
