<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassWiseShift;
use App\Models\AddShift;
use Illuminate\Http\Request;

class AddClassWiseShiftController extends Controller
{
    public function add_class_wise_shift(Request $request,$schoolCode)
    {
       // $school_code = '100';
        // $classWiseShiftData = AddClassWiseShift::where('action', 'approved')->where('school_code', $school_code)->get();

        if ($request->has('class_name')) {
            // If a class name is provided, filter the $classWiseShiftData based on that class name
            $selectedClassName = $request->input('class_name');
            // dd($selectedClassName);
            $classWiseShiftData = AddClassWiseShift::where('action', 'approved')
                ->where('school_code',$schoolCode)
                ->where('class_name', $selectedClassName)
                ->get();
        } elseif ($request->session()->get('class_name')) {
            $selectedClassName = $request->session()->get('class_name');
            // dd($selectedClassName);
            $classWiseShiftData = AddClassWiseShift::where('action', 'approved')
                ->where('school_code', $schoolCode)
                ->where('class_name', $selectedClassName)
                ->get();
        } else {
            // If no class name is provided, retrieve all class-wise shift data
            $selectedClassName = null;
            $classWiseShiftData = AddClassWiseShift::where('action', 'approved')
                ->where('school_code', $schoolCode)
                ->get();
        }

        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $shiftData = AddShift::where('action', 'approved')->where('school_code',$schoolCode)->get();

        return view('Backend/BasicInfo/CommonSetting/addClassWiseShift', compact('classData', 'shiftData', 'classWiseShiftData', 'selectedClassName'));
    }

    public function store_add_class_wise_shift(Request $request,$schoolCode)
    {
        // dd($request);
        // Validate form data
        $request->validate([
            'class_name' => 'required|string',
            'shift_name' => 'required|string'
        ]);

        //$school_code = '100';

        // Check if the combination of class name and shift name already exists for this school
        $existingRecord = AddClassWiseShift::where('school_code', $schoolCode)
            ->where('class_name', $request->class_name)
            ->where('shift_name', $request->shift_name)
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same class name and shift name already exists for this school.');
        }

        // Save class name to database
        $classWiseShift = new AddClassWiseShift();
        $classWiseShift->class_name = $request->class_name;
        $classWiseShift->shift_name = $request->shift_name;
        $classWiseShift->status = 'active';
        $classWiseShift->action = 'approved';
        $classWiseShift->school_code = $schoolCode;
        // dd($classWiseShift);
        $classWiseShift->save();

        // return redirect()->back()->with('success', 'class wise shift added successfully!');
        return redirect()->route('add.class.wise.shift')->with('success', 'Class wise shift added successfully!')->with('class_name', $request->class_name);
    }

    public function delete_add_class_wise_shift($id)
    {
        $class = AddClassWiseShift::findOrFail($id);
        $class->delete();
        return redirect()->back()->with('success', 'Class wise shift deleted successfully!');
    }
}
