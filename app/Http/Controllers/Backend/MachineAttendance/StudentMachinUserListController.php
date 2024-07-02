<?php

namespace App\Http\Controllers\Backend\MachineAttendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentMachinUserListController extends Controller
{
    public function viewStdMachineUserList()
    {
        return view('Backend.MachineAttendence.stdMachineUserList');
    }
}
