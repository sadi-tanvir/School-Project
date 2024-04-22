<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddSignature;
use Illuminate\Http\Request;

class AddSignatureController extends Controller
{
    public function listSignature($schoolCode){
        //$school_code = '100';
        $signData = AddSignature::where('action', 'approved')->where('school_code', $schoolCode)->get();
       
        return view ('Backend/BasicInfo/ExamSetting/listSignature', compact('signData'));
    }

    public function AddSignature($schoolCode)
    {
        
       
        return view('Backend/BasicInfo/ExamSetting/addSignature');
    }
    
    public function store_add_sign(Request $request,$schoolCode)
    {
        // Validate the incoming request data
        $request->validate([
            'sign' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

      

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            //$school_code = '100'; // Your school code here

            $imagePath = $request->file('image')->move('images/Signature', $request->input('school_code') . '_' . uniqid() . '.' . $request->file('image')->extension());
            $signImage = 'images/Signature/' . basename($imagePath);
             // Set the school code
       
        // Check if any record with the same school_code, class_name, or position already exists
        $existingRecord = AddSignature::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('sign', $request->sign);
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same sign name already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $sign = new AddSignature();
        $sign->sign = $request->sign;
        $sign->image = $signImage;
        $sign->action = 'approved';
        $sign->school_code = $schoolCode;

        // Save the new record
        $sign->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Signature added successfully!');
    }
}


    public function delete_add_sign($id)
    {
        $report = AddSignature::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('success', 'Signature deleted successfully!');
    }
}
