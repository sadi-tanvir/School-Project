<?php

namespace App\Http\Controllers\Backend\MachineAttendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentTimeSettingController extends Controller
{
    public function viewTimeSetting()
    {
        return view('Backend.MachineAttendence.stdTimeSettings');
    }
}
