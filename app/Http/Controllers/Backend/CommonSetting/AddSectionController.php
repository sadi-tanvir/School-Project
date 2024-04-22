<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddSection;
use Illuminate\Http\Request;

class AddSectionController extends Controller
{
    public function add_section($schoolCode)
    {
        
        //$school_code = '100';
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $schoolCode)->get();
       
        return view('Backend/BasicInfo/CommonSetting/addSection', compact('sectionData'));
    }
    

    public function store_add_section(Request $request,$schoolCode)
    {

        // dd($request);
        // Validate the incoming request data
        $request->validate([
            'section_name' => 'required|string|max:255',            
            'status' => 'required|string|in:active,in active',
        ]);

       

        // Set the school code
        //$school_code = '100'; // Your school code here

        // Check if any record with the same school_code, section_name, or position already exists
        $existingRecord = AddSection::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('section_name', $request->section_name);                   
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same section name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $section = new AddSection();
        $section->section_name = $request->section_name;
        
        $section->status = $request->status;
        // dd($section);
        $section->action = 'approved';
        $section->school_code = $schoolCode;

        // Save the new record
        $section->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'section added successfully!');
    }

    public function delete_add_section($id)
    {
        $section = AddSection::findOrFail($id);
        $section->delete();
        return redirect()->back()->with('success', 'section deleted successfully!');
    }
}
