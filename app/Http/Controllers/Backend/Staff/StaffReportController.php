<?php

namespace App\Http\Controllers\Backend\Staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffReportController extends Controller
{
    public function staffReport($schoolCode)
    {
        $staffs = Staff::where("school_code", $schoolCode)->get();
        return view("Backend.Staff.staffReport", compact("staffs"));
    }


    public function staffDelete(Request $request, $id, $schoolCode)
    {
        $staff = Staff::where("school_code", $schoolCode)->where("id", $id)->delete();
        if ($staff) {
            return redirect()->back()->with('success', 'staff deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed To Delete Staff!');
        }
    }
}
