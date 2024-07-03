<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home($school_code){
        $school_info = SchoolInfo::where('school_code', $school_code)->first();
        return view('Backend/Home/home',compact('school_info'));
    }
}
