<?php

namespace App\Http\Controllers\Backend\NEDUBD;

use App\Http\Controllers\Controller;
use App\Models\SchoolAdmin;
use Illuminate\Support\Facades\Hash;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;

class SchoolAdminController extends Controller
{
    public function addSchoolAdmin()
    {
        $schools = SchoolInfo::all();
        return view("Backend.NEDUBD.addSchoolAdmin", compact("schools"));
    }

    public function createSchoolAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:4',
            'school_name' => 'required|string',
            'school_code' => 'required|string',
            'mobile_number' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $adminPath = $request->file('image')->move('images/admin', $request->input('school_code') . '_' . uniqid() . '.' . $request->file('image')->extension());
            $adminImage = 'images/admin/' . basename($adminPath);


            $isExist = SchoolAdmin::where('email', $request->input('email'))
                ->exists();

            if ($isExist) {
                return back()->with('error', 'Failed. This email already exists');
            }

            $admin = new SchoolAdmin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->password = Hash::make($request->input('password'));
            $admin->school_name = $request->input('school_name');
            $admin->school_code = $request->input('school_code');
            $admin->mobile_number = $request->input('mobile_number');
            $admin->image = $adminImage;
            $admin->role = $request->input('role');
            $admin->save();
            return redirect('/dashboard/addSchoolAdmin')->with('success', 'Admin Sucessfully  created.');
        }
    }
}
