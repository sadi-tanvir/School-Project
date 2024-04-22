<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use Illuminate\Http\Request;

class AddClassController extends Controller
{
    public function add_class($schoolCode)
    {
        
       // $school_code = '100';
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
       
        return view('Backend/BasicInfo/CommonSetting/addClass', compact('classData'));
    }
    
    public function store_add_class(Request $request,$schoolCode)
    {
        // Validate the incoming request data
        $request->validate([
            'class_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|string|in:active,in active',
        ]);

        // Set the school code
       // $school_code = '100'; // Your school code here

        // Check if any record with the same school_code, class_name, or position already exists
        $existingRecord = AddClass::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('class_name', $request->class_name)
                    ->orWhere('position', $request->position);
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same class name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $class = new AddClass();
        $class->class_name = $request->class_name;
        $class->position = $request->position;
        $class->status = $request->status;
        // dd($class);
        $class->action = 'approved';
        $class->school_code = $schoolCode;

        // Save the new record
        $class->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Class added successfully!');
    }

    public function delete_add_class($id)
    {
        $class = AddClass::findOrFail($id);
        $class->delete();
        return redirect()->back()->with('success', 'Class deleted successfully!');
    }
}
