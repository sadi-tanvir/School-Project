<?php

namespace App\Http\Controllers\Backend\Staff\BasicSettings;

use App\Http\Controllers\Controller;
use App\Models\StaffDepartment;
use Illuminate\Http\Request;

class StaffDepartmentController extends Controller
{
    public function StaffDepartment(Request $request, $schoolCode)
    {
        $searchTerm = $request->input('search_types');

        $query = StaffDepartment::query();

        if ($searchTerm) {
            $query->where("school_code", $schoolCode)
                ->where('department', 'like', '%' . $searchTerm . '%')
                ->orWhere('position', 'like', '%' . $searchTerm . '%')
                ->orWhere('status', 'like', '%' . $searchTerm . '%');
        }

        $staffDepartments = $query->where("school_code", $schoolCode)->orderBy('position', 'asc')->get();

        return view('Backend.Staff.BasicSetting.addDepartment', compact('schoolCode', 'staffDepartments'));
    }


    // store
    public function CreateStaffDepartment(Request $request, $schoolCode)
    {
        try {
            $request->validate([
                'department' => 'required',
                'position' => 'required | integer',
            ]);

            $staffDepartment = new StaffDepartment();
            $staffDepartment->department = $request->input('department');
            $staffDepartment->position = $request->input('position');
            $staffDepartment->status = $request->input('status') ? 'active' : 'inactive';
            $staffDepartment->school_code = $schoolCode;
            $staffDepartment->save();

            return redirect()->route('staffDepartment.display', ["schoolCode" => $schoolCode])->with('success', 'Department Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while saving the Department.');
        }
    }



    // delete
    public function StaffDepartmentDelete(Request $request, $schoolCode, $id)
    {
        try {
            $staffDepartment = StaffDepartment::where("school_code", $schoolCode)->where('id', $id)->first();
            $staffDepartment->delete();

            return redirect()->route('staffDepartment.display', ["schoolCode" => $schoolCode])->with('success', 'Department Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while deleting the Department.');
        }
    }



    // update
    public function StaffDepartmentUpdate(Request $request, $schoolCode, $id)
    {
        try {
            $request->validate([
                'department' => 'required',
                'position' => 'required | integer',
            ]);

            $staffDepartment = StaffDepartment::where("school_code", $schoolCode)->where('id', $id)->first();
            $staffDepartment->department = $request->input('department');
            $staffDepartment->position = $request->input('position');
            $staffDepartment->status = $request->input('status') ? 'active' : 'inactive';
            $staffDepartment->save();

            return redirect()->route('staffDepartment.display', ["schoolCode" => $schoolCode])->with('success', 'Department Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while updating the Department.');
        }
    }
}
