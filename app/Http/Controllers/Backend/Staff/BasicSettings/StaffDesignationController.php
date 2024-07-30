<?php

namespace App\Http\Controllers\Backend\Staff\BasicSettings;

use App\Http\Controllers\Controller;
use App\Models\StaffDesignation;
use Illuminate\Http\Request;

class StaffDesignationController extends Controller
{
    public function StaffDesignation(Request $request, $schoolCode)
    {
        $searchTerm = $request->input('search_types');

        $query = StaffDesignation::query();

        if ($searchTerm) {
            $query->where("school_code", $schoolCode)
                ->where('designation', 'like', '%' . $searchTerm . '%')
                ->orWhere('position', 'like', '%' . $searchTerm . '%')
                ->orWhere('status', 'like', '%' . $searchTerm . '%');
        }

        $staffDesignation = $query->where("school_code", $schoolCode)->orderBy('position', 'asc')->get();

        return view('Backend.Staff.BasicSetting.addDesignation', compact('schoolCode', 'staffDesignation'));
    }


    // store
    public function CreateStaffDesignation(Request $request, $schoolCode)
    {
        try {
            $request->validate([
                'designation' => 'required',
                'position' => 'required | integer',
            ]);

            $staffDesignation = new StaffDesignation();
            $staffDesignation->designation = $request->input('designation');
            $staffDesignation->position = $request->input('position');
            $staffDesignation->status = $request->input('status') ? 'active' : 'inactive';
            $staffDesignation->school_code = $schoolCode;
            $staffDesignation->save();

            return redirect()->route('staffDesignation.display', ["schoolCode" => $schoolCode])->with('success', 'Designation Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while saving the Designation.');
        }
    }



    // delete
    public function StaffDesignationDelete(Request $request, $schoolCode, $id)
    {
        try {
            $staffDesignation = StaffDesignation::where("school_code", $schoolCode)->where('id', $id)->first();
            $staffDesignation->delete();

            return redirect()->route('staffDesignation.display', ["schoolCode" => $schoolCode])->with('success', 'Designation Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while deleting the Designation.');
        }
    }



    // update
    public function StaffDesignationUpdate(Request $request, $schoolCode, $id)
    {
        try {
            $request->validate([
                'designation' => 'required',
                'position' => 'required | integer',
            ]);

            $staffDesignation = StaffDesignation::where("school_code", $schoolCode)->where('id', $id)->first();
            $staffDesignation->designation = $request->input('designation');
            $staffDesignation->position = $request->input('position');
            $staffDesignation->status = $request->input('status') ? 'active' : 'inactive';
            $staffDesignation->save();

            return redirect()->route('staffDesignation.display', ["schoolCode" => $schoolCode])->with('success', 'Designation Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while updating the Designation.');
        }
    }
    /*
               // Print
               public function FeeTypePrint(Request $request, $schoolCode)
               {
                   $feeTypes = AddFeeType::get();
                   $schoolInfo = SchoolInfo::where('school_code', $schoolCode)->first();
                   $date = now();
                   return view('Backend.BasicInfo.FeesSetting.AllFeeTypesPrint', compact('schoolCode', 'feeTypes', 'schoolInfo', 'date'));
               } */
}
