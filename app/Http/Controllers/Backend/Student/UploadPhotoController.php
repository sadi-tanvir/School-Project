<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddClassWiseShift;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadPhotoController extends Controller
{
    public function uploadStudentPhoto(Request $request, $school_code)
    {
        $students = null;
        $students = $request->session()->get('students');
        $academic_year = $request->session()->get('academic_year');
        $classes = AddClass::where('school_code', $school_code)->where('action', 'approved')->get();
        $sections = AddSection::where('school_code', $school_code)->where('action', 'approved')->get();
        $groups = AddGroup::where('school_code', $school_code)->where('action', 'approved')->get();
        $categories = AddCategory::where('school_code', $school_code)->where('action', 'approved')->get();
        $years = AddAcademicYear::where('school_code', $school_code)->where('action', 'approved')->get();
        return view('Backend.Student.updateUploadPhoto', compact('classes', 'sections', 'groups', 'categories', 'years', 'students', 'academic_year'));
    }



    public function updatePhoto(Request $request)
    {
       

        $class = $request->class;
        $group = $request->group;
        $section = $request->section;
        $category = $request->category;
        $academic_year = $request->academic_year;
        $school_code = $request->school_code;
        $selectedGender=$request->gender;
        $students = [];
        $students = Student::where('school_code', $school_code)
            ->where('action', 'approved')
            ->where('class_name', $class)
            ->where('group', $group)
            ->where('section', $section)
            ->where('category', $category)
            ->where('year', $academic_year)
            ->where('gender',$selectedGender)
            ->get();
       

        $classes = AddClass::where('school_code', $school_code)->where('action', 'approved')->get();
        $sections = AddSection::where('school_code', $school_code)->where('action', 'approved')->get();
        $groups = AddGroup::where('school_code', $school_code)->where('action', 'approved')->get();
        $categories = AddCategory::where('school_code', $school_code)->where('action', 'approved')->get();
        $years = AddAcademicYear::where('school_code', $school_code)->where('action', 'approved')->get();

        return view('Backend.Student.updateUploadPhoto', compact('classes', 'sections', 'groups', 'categories', 'years', 'students', 'class', 'group', 'section', 'category', 'academic_year'));
    }


    public function getGroups(Request $request, $school_code)
    {
        $class = $request->class;

        $groups = AddClassWiseGroup::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($groups);
    }

    public function getSections(Request $request, $school_code)
    {
        $class = $request->class;
        $sections = AddClassWiseSection::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($sections);
    }

    public function getShifts(Request $request, $school_code)
    {
        $class = $request->class;
        $shifts = AddClassWiseShift::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($shifts);
    }


    public function updateImage(Request $request, $school_code, $id)
    {
        // dd($request);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $student = Student::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if (!is_null($student->image)) {
                Storage::delete('public/' . $student->image);
            }
            $imagePath = $request->file('image')->move('images/student', $id . '_' . uniqid() . '.' . $request->file('image')->extension());
            $student->image = $imagePath;
            $student->save();

            $class = $request->input('class');
            $section = $request->input('section');
            $group = $request->input('group');
            $category = $request->input('category');
            $year = $request->input('year');

            //dd($class);


            $students = [];
            $students = Student::where('school_code', $school_code)
                ->where('action', 'approved')
                ->where('class_name', $class)
                ->where('group', $group)
                ->where('section', $section)
                ->where('category', $category)
                ->where('year', $year)
                ->get();
            // dd($students);
            return redirect()->route('StudentPhoto', $school_code)->with([
                'success' => 'Student image updated successfully.',
                'students' => $students,
                'academic_year' => $year
            ]);

        }

        return redirect()->back()->with('error', 'Failed to update student image.');
    }









    public function uploadPhoto()
    {
        return view('Backend.Student.uploadPhoto');
    }
}
