<?php

namespace App\Http\Controllers\Backend\NEDUBD;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NEDUBDController extends Controller
{
    public function addAdmin($school_code)
    {
        $admins=Admin::all();

        return view("Backend.NEDUBD.addAdmin",["admins"=>$admins]);
    }

    public function createAdmin(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|string',
            'role' => 'required|string',
            'phone_number' => 'required|string',
            'password' => 'required|string|min:4',
            'repeat_password' => 'required|string|min:4',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->move('images/Admin', $request->input('role') . '_' . uniqid() . '.' . $request->file('image')->extension());
            $AdminImage = 'images/admin/' . basename($imagePath);

            if ($request->input('password') !== $request->input('repeat_password')) {
                return back()->with('error', 'Password did not match');
            }
            $isExist = Admin::where('email', $request->input('email'))
                ->exists();
            if ($isExist) {
                return back()->with('error', 'Failed. This Admin already exists');
            }
            $Admin = new Admin();
            $Admin->first_name = $request->input('first_name');
            $Admin->last_name = $request->input('last_name');
            $Admin->image = $AdminImage;
            $Admin->email = $request->input('email');
            $Admin->password = Hash::make($request->input('password'));
            $Admin->role = $request->input('role');
            $Admin->phone_number = $request->input('phone_number');
            $Admin->school_code = 'nedubd';
            $Admin->save();
            return redirect('/dashboard/addAdmin')->with('success', 'Admin Sucessfully  created.');


        }
    }

    public function addSchoolInfo()
    {
        $latestSchoolInfo = SchoolInfo::latest()->first();

        $schoolInfo=SchoolInfo::all();
        $schoolCode = null;
       
        if ($latestSchoolInfo) {
            $getSchoolCode = $latestSchoolInfo->school_code;
            $schoolCode = (int) $getSchoolCode + 1;
        }
        else{
            $schoolCode = 10101;
        }
        return view('Backend.NEDUBD.addSchoolInfo', compact('schoolCode'), ['schoolInfo'=>$schoolInfo]);
    }


    public function createSchoolInfo(Request $request)
    {
        $this->validate($request, [
            'school_email' => 'required|string',
            'school_name' => 'required|string',
            'school_phone' => 'required|string',
            'mobile_number' => 'required|string',
            'address' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'school_code' => 'required|string',
        ]);

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $logoPath = $request->file('logo')->move('images/logo', $request->input('school_code') . '_' . uniqid() . '.' . $request->file('logo')->extension());
            $logo = 'images/logo/' . basename($logoPath);
            $SchoolInfo = new SchoolInfo();
            $SchoolInfo->school_email = $request->input('school_email');
            $SchoolInfo->school_name = $request->input('school_name');
            $SchoolInfo->school_phone = $request->input('school_phone');
            $SchoolInfo->mobile_number = $request->input('mobile_number');
            $SchoolInfo->address = $request->input('address');
            $SchoolInfo->eiin = $request->input('eiin');
            $SchoolInfo->website = $request->input('website');
            $SchoolInfo->logo = $logo;
            $SchoolInfo->school_code = $request->input('school_code');
            $SchoolInfo->save();
            return redirect('/dashboard/addSchoolInfo')->with('success', 'SchoolInfo Sucessfully  Added.');

        }

      
    }
}
