<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddGroup;
use Illuminate\Http\Request;

class AddClassWiseGroupController extends Controller
{
    public function add_class_wise_group(Request $request,$schoolCode)
    {
        //$school_code = '100';

        // $classWiseGroupData = AddClassWiseGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        if ($request->has('class_name')) {
            // If a class name is provided, filter the $classWiseGroupData based on that class name
            $selectedClassName = $request->input('class_name');
            // dd($selectedClassName);
            $classWiseGroupData = AddClassWiseGroup::where('action', 'approved')
                ->where('school_code', $schoolCode)
                ->where('class_name', $selectedClassName)
                ->get();
        } elseif ($request->session()->get('class_name')) {
            $selectedClassName = $request->session()->get('class_name');
            // dd($selectedClassName);
            $classWiseGroupData = AddClassWiseGroup::where('action', 'approved')
                ->where('school_code',$schoolCode)
                ->where('class_name', $selectedClassName)
                ->get();
        } else {
            // If no class name is provided, retrieve all class-wise group data
            $selectedClassName = null;
            $classWiseGroupData = AddClassWiseGroup::where('action', 'approved')
                ->where('school_code', $schoolCode)
                ->get();
        }

        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $schoolCode)->get();

        return view('Backend/BasicInfo/CommonSetting/addClassWiseGroup', compact('classData', 'groupData', 'classWiseGroupData', 'selectedClassName'));
    }

    public function store_add_class_wise_group(Request $request,$schoolCode)
    {
        // Validate form data
        $request->validate([
            'class_name' => 'required|string',
            'group_name' => 'required|string'
        ]);

       // $school_code = '100';

        // Check if the combination of class name and group name already exists for this school
        $existingRecord = AddClassWiseGroup::where('school_code', $schoolCode)
            ->where('class_name', $request->class_name)
            ->where('group_name', $request->group_name)
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same class name and group name already exists for this school.');
        }

        // Create a new record for the selected group and class combination
        $newRecord = new AddClassWiseGroup();
        $newRecord->school_code = $schoolCode;
        $newRecord->class_name = $request->class_name;
        $newRecord->group_name = $request->group_name;
        $newRecord->status = 'active';
        $newRecord->action = 'approved';
        $newRecord->save();

        // return redirect()->back()->with('success', 'Class wise group added successfully!');
        return redirect()->route('add.class.wise.group',$schoolCode)->with('success', 'Class wise group added successfully!')->with('class_name', $request->class_name);
    }


    public function delete_add_class_wise_group($id)
    {
        $class = AddClassWiseGroup::findOrFail($id);
        $class->delete();
        return redirect()->back()->with('success', 'Class wise group deleted successfully!');
    }
}
