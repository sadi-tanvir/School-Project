<?php

namespace App\Http\Controllers\Backend\Staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffReportController extends Controller
{
    public function staffReport()
    {
        $staffs = Staff::get();
        return view("Backend.Staff.staffReport", compact("staffs"));
    }
}
