<?php

namespace App\Http\Controllers\Backend\Staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\StaffDepartment;
use App\Models\StaffDesignation;
use Illuminate\Http\Request;

class StaffUpdateController extends Controller
{
    public function staffUpdateForm(Request $request, $id, $schoolCode)
    {
        $staff = Staff::where("school_code", $schoolCode)->where("id", $id)->first();
        $staffDesignations = StaffDesignation::where("school_code", $schoolCode)->get();
        $staffDepartments = StaffDepartment::where("school_code", $schoolCode)->get();
        return view("Backend.Staff.updateStaff", compact("staff", "staffDesignations", "staffDepartments"));
    }



    public function staffUpdate(Request $request, $id, $schoolCode)
    {
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagePath = $request->file('image')->move('images/staff', $request->input('staff_id') . '_' . uniqid() . '.' . $request->file('image')->extension());


            $staffImage = 'images/staff/' . basename($imagePath);

            $isExist = Staff::where("school_code", $schoolCode)->where('staff_id', $request->input('staff_id'))
                ->exists();

            if ($isExist) {
                return back()->with('error', 'Failed. This staff already exists');
            }
        }

        $name = $request->input('name');
        $designation = $request->input('designation');
        $permanent_same_present = $request->input('permanent_same_present');
        $present_village = $request->input('present_village');
        $present_post_office = $request->input('present_post_office');
        $present_zip_code = $request->input('present_zip_code');
        $present_district = $request->input('present_district');
        $present_police_station = $request->input('present_police_station');

        if (!$name || !$designation) {
            return redirect()->back()->with('error', 'Select All Mandatory Fields!');
        }
        ;

        $staff = Staff::where("school_code", $schoolCode)->where("id", $id)->first();
        $staff->staff_id = $request->input('staff_id');
        $staff->name = $name;
        $staff->mobile = $request->input('mobile');
        $staff->image = $staffImage ?? null;
        $staff->emg_mobile = $request->input('emg_mobile');
        $staff->email = $request->input('email');
        $staff->password = $request->input('password');
        $staff->fbid = $request->input('fbid');
        $staff->department = $request->input('department');
        $staff->designation = $designation;
        $staff->gender = $request->input('gender');
        $staff->subject = $request->input('subject');
        $staff->index = $request->input('index');
        $staff->salary_account = $request->input('salary_account');
        $staff->pf = $request->input('pf');
        $staff->father_name = $request->input('father_name');
        $staff->father_mobile = $request->input('father_mobile');
        $staff->mother_name = $request->input('mother_name');
        $staff->mother_number = $request->input('mother_number');
        $staff->birth_date = $request->input('birth_date');
        $staff->nationality = $request->input('nationality');
        $staff->blood = $request->input('blood');
        $staff->nid = $request->input('nid');
        $staff->marital_status = $request->input('marital_status');
        $staff->age = $request->input('age');
        $staff->religious = $request->input('religious');
        $staff->joining_date = $request->input('joining_date');
        $staff->present_village = $present_village;
        $staff->present_post_office = $present_post_office;
        $staff->present_zip_code = $present_zip_code;
        $staff->present_district = $present_district;
        $staff->present_police_station = $present_police_station;
        $staff->parmanent_village = $permanent_same_present ? $present_village : $request->input('parmanent_village');
        $staff->parmanent_post_office = $permanent_same_present ? $present_post_office : $request->input('parmanent_post_office');
        $staff->parmanent_zip_code = $permanent_same_present ? $present_zip_code : $request->input('parmanent_zip_code');
        $staff->parmanent_district = $permanent_same_present ? $present_district : $request->input('parmanent_district');
        $staff->parmanent_police_station = $permanent_same_present ? $present_police_station : $request->input('parmanent_police_station');
        $staff->ssc = $request->input('ssc');
        $staff->school_name = $request->input('school_name');
        $staff->ssc_department = $request->input('ssc_department');
        $staff->ssc_roll = $request->input('ssc_roll');
        $staff->ssc_reg = $request->input('ssc_reg');
        $staff->ssc_gpa = $request->input('ssc_gpa');
        $staff->ssc_year = $request->input('ssc_year');
        $staff->hsc = $request->input('hsc');
        $staff->college_name = $request->input('college_name');
        $staff->college_department = $request->input('college_department');
        $staff->college_roll = $request->input('college_roll');
        $staff->college_reg = $request->input('college_reg');
        $staff->college_gpa = $request->input('college_gpa');
        $staff->college_passing_year = $request->input('college_passing_year');
        $staff->honors = $request->input('honors');
        $staff->versity_name = $request->input('versity_name');
        $staff->versity_department = $request->input('versity_department');
        $staff->versity_roll = $request->input('versity_roll');
        $staff->versity_reg = $request->input('versity_reg');
        $staff->versity_gpa = $request->input('versity_gpa');
        $staff->versity_passing_year = $request->input('versity_passing_year');
        $staff->qua_name = $request->input('qua_name');
        $staff->qua_industry_name = $request->input('qua_industry_name');
        $staff->qua_description = $request->input('qua_description');
        $staff->qua_2_name = $request->input('qua_2_name');
        $staff->qua_2_industry_name = $request->input('qua_2_industry_name');
        $staff->qua_2_description = $request->input('qua_2_description');
        $staff->post_name = $request->input('post_name');
        $staff->industrial_name = $request->input('industrial_name');
        $staff->start_date = $request->input('start_date');
        $staff->end_date = $request->input('end_date');
        $staff->school_code = $schoolCode;
        $staff->role = $request->input('role');
        $staff->action = $request->input('action');
        $staff->save();

        return redirect()->back()->with('success', 'staff updated successfully!');
    }
}
