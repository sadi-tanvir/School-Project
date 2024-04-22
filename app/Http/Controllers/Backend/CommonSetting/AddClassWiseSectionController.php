<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassWiseSection;
use App\Models\AddSection;
use Illuminate\Http\Request;

class AddClassWiseSectionController extends Controller
{
    public function add_class_wise_section(Request $request,$schoolCode)
    {

       // $school_code = '100';


        // $classWiseSectionData = AddClassWiseSection::where('action', 'approved')->where('school_code', $school_code)->get();

        if ($request->has('class_name')) {
            // If a class name is provided, filter the $classWiseGroupData based on that class name
            $selectedClassName = $request->input('class_name');
            // dd($selectedClassName);
            $classWiseSectionData = AddClassWiseSection::where('action', 'approved')
                ->where('school_code',$schoolCode)
                ->where('class_name', $selectedClassName)
                ->get();
        } elseif ($request->session()->get('class_name')) {
            $selectedClassName = $request->session()->get('class_name');
            // dd($selectedClassName);
            $classWiseSectionData = AddClassWiseSection::where('action', 'approved')
                ->where('school_code', $schoolCode)
                ->where('class_name', $selectedClassName)
                ->get();
        } else {
            // If no class name is provided, retrieve all class-wise group data
            $selectedClassName = null;
            $classWiseSectionData = AddClassWiseSection::where('action', 'approved')
                ->where('school_code', $schoolCode)
                ->get();
        }

        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code',$schoolCode)->get();

        return view('Backend/BasicInfo/CommonSetting/addClassWiseSection', compact('classData', 'sectionData', 'classWiseSectionData', 'selectedClassName'));
    }


    public function store_add_class_wise_section(Request $request,$schoolCode)
    {
        // dd($request);
        // Validate form data
        $request->validate([
            'class_name' => 'required|string',
            'section_name' => 'required|string'
        ]);

        //$school_code = '100';


        // Check if the combination of class name and group name already exists for this school
        $existingRecord = AddClassWiseSection::where('school_code', $schoolCode)
            ->where('class_name', $request->class_name)
            ->where('section_name', $request->section_name)
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same class name and group name already exists for this school.');
        }

        // Save class name to database
        $classWiseSection = new AddClassWiseSection();
        $classWiseSection->class_name = $request->class_name;
        $classWiseSection->section_name = $request->section_name;
        $classWiseSection->status = 'active';
        $classWiseSection->action = 'approved';
        $classWiseSection->school_code = $schoolCode;
        // dd($classWiseSection);
        $classWiseSection->save();


        // return redirect()->back()->with('success', 'class wise section added successfully!');
        return redirect()->route('add.class.wise.section',$schoolCode)->with('success', 'Class wise group added successfully!')->with('class_name', $request->class_name);
    }

    public function delete_add_class_wise_section($id)
    {
        $class = AddClassWiseSection::findOrFail($id);
        $class->delete();
        return redirect()->back()->with('success', 'Class wise section deleted successfully!');
    }
}
