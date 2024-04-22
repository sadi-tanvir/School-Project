<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddGroup;
use Illuminate\Http\Request;

class AddGroupController extends Controller
{
    public function add_group($schoolCode)
    {
        
        //$school_code = '100';
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $schoolCode)->get();
       
        return view('Backend/BasicInfo/CommonSetting/addGroup', compact('groupData'));
    }
    

    public function store_add_group(Request $request,$schoolCode)
    {

        // dd($request);
        // Validate the incoming request data
        $request->validate([
            'group_name' => 'required|string|max:255',            
            'status' => 'required|string|in:active,in active',
        ]);

       

        // Set the school code
       // $school_code = '100'; // Your school code here

        // Check if any record with the same school_code, group_name, or position already exists
        $existingRecord = AddGroup::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('group_name', $request->group_name);                   
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same group name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $group = new AddGroup();
        $group->group_name = $request->group_name;
        
        $group->status = $request->status;
        // dd($group);
        $group->action = 'approved';
        $group->school_code = $schoolCode;

        // Save the new record
        $group->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'group added successfully!');
    }

    public function delete_add_group($id)
    {
        $group = AddGroup::findOrFail($id);
        $group->delete();
        return redirect()->back()->with('success', 'group deleted successfully!');
    }
}
