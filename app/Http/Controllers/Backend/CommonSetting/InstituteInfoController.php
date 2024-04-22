<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\InstituteInfo;
use Illuminate\Http\Request;

class InstituteInfoController extends Controller
{
    public function add_institute_info()
    {
        return view('Backend/BasicInfo/CommonSetting/addInstituteInfo');
    }
    public function store_add_institute_info(Request $request)
    {
        dd($request);
        // Validate form data
        $validation = $request->validate([
            'institute_code' => 'required|string|unique:institute_info,institute_code,' . $request->institute_code,
            'eiin' => 'required|string',
            'institute_name' => 'required|string',
            'address1' => 'required|string',
            'address2' => 'required|string',
            'phone' => 'required|string|size:11|unique:institute_info,phone,' . $request->phone,
            'fax' => 'required|string',
            'email' => 'required|email|unique:institute_info,email,' . $request->email,
            'website' => 'required|string',

        ]);

 

        // Handle logo file upload if provided
        if ($request->image) {
                    
            $logoPath = $request->image->move('assets/upload/institute_photo', uniqid() . '.' . $request->file('image')->extension());
            dd($logoPath);
            
            dd($logoPath);
            $institutePhoto = 'assets/upload/institute_photo/' . basename($logoPath);
        }

        // dd($request->image);
        // Retrieve the institute info from the database
        $instituteInfo = new InstituteInfo();

        // Update institute info
        $instituteInfo->eiin = $request->eiin;
        $instituteInfo->institute_name = $request->institute_name;
        $instituteInfo->address1 = $request->address1;
        $instituteInfo->address2 = $request->address2;
        $instituteInfo->phone = $request->phone;
        $instituteInfo->fax = $request->fax;
        $instituteInfo->email = $request->email;
        $instituteInfo->website = $request->website;



        // Save changes
        $instituteInfo->save();

        return redirect()->back()->with('success', 'Institute information updated successfully!');
    }
}
