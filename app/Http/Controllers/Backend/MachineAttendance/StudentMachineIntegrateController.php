<?php

namespace App\Http\Controllers\Backend\MachineAttendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentMachineIntegrateController extends Controller
{
    public function viewMachineIntegrade()
    {
        return view('Backend.MachineAttendence.stdMachineIntegrate');
    }
}
