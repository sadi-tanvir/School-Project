<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\FourthSubject;
use App\Models\Student;
use Illuminate\Http\Request;

class FourthSubjectController extends Controller
{
    public function fourthSubject(Request $request, $school_code)
    {
        // $school_code = '100';
        $class = null;
        $section = null;
        $group = null;
        $year = null;

        $classes = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groups = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sections = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $years = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();

        $students = []; // Initialize $students

        if ($request->session()->get('class_name')) {

            $class = $request->session()->get('class_name');
            $section = $request->session()->get('section_name');
            $group = $request->session()->get('group_name');
            $year = $request->session()->get('year');

            $students = Student::where('action', 'approved')
                ->where('school_code', $school_code)
                ->where('class_name', $class)
                ->where('section', $section)
                ->where('group', $group)
                ->where('year', $year)
                ->get();
        }

        $fourthSubjectStudents=FourthSubject::all();

        return view('Backend/BasicInfo/ExamSetting/setForthSubject', compact('classes', 'groups', 'sections', 'years', 'students','fourthSubjectStudents'));

    }


    public function addFourthSubject(Request $request)
    {
        return redirect()->route('set.Forth.Subject')->with([
            'class_name' => $request->class_name,
            'group_name' => $request->group_name,
            'section_name' => $request->section_name,
            'year' => $request->year
        ]);

    }

    public function saveFourthSubject(Request $request)
    {
        if ($request->has('selected_students')) {
            $students = $request->input('selected_students');
            // dd($students);




           

            foreach ($students as $student) {
                $existingData = FourthSubject::where('action', 'approved')
                ->where('school_code', $request->input('school_code'))
                ->where('class_name', $request->class_name)
                ->where('group', $request->group)
                ->where('section', $request->section)
                ->where('year', $request->year)
                ->where('shift', $request->shift)
                ->where('student_id', $student)
                ->get();

                if($existingData){
                    return redirect()->back()->with('error', 'fouth Subject have already added!');
                }else{
                    $fouthSubject = new FourthSubject();
                    $fouthSubject->optional_subject = $request->optional_subject;
                    $fouthSubject->compulsory_subject = $request->compulsory_subject;
                    $fouthSubject->class_name = $request->class_name;
                    $fouthSubject->section = $request->section_name;
                    $fouthSubject->group = $request->group;
                    $fouthSubject->shift = $request->shift;
                    $fouthSubject->year = $request->year;
                    $fouthSubject->action = $request->action;
                    $fouthSubject->type = $request->type;
                    $fouthSubject->school_code = $request->school_code;
                    $fouthSubject->student_id = $student;
                    $fouthSubject->save();
                }
            }
            return redirect()->back()->with('success', 'fouth Subject added successfully!');

        }
    }

    public function viewFourthSubject(Request $request)
    {
        $school_code = '100';

        $classes = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groups = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sections = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $years = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        $fourthSubjects = FourthSubject::where('school_code', $school_code)->get();


        $students = []; // Initialize $students

        if ($request->session()->get('class_name')) {

            $class = $request->session()->get('class_name');
            $section = $request->session()->get('section_name');
            $group = $request->session()->get('group_name');
            $year = $request->session()->get('year');

            $students = FourthSubject::where('action', 'approved')
                ->where('school_code', $school_code)
                ->where('class_name', $class)
                ->where('section', $section)
                ->where('group', $group)
                ->where('year', $year)
                ->get();
        }
        return view('Backend/BasicInfo/ExamSetting/viewFourthSubject', compact('classes', 'groups', 'sections', 'years', 'students'));
    }


    public function getFourthSubject(Request $request)
    {

        return redirect()->route('viewFourthSubject')->with([
            'class_name' => $request->class_name,
            'group_name' => $request->group_name,
            'section_name' => $request->section_name,
            'year' => $request->year
        ]);

    }

    public function deleteFourthSubject($id)
    {
        $fourthSubject = FourthSubject::findOrFail($id);
        $fourthSubject->delete();
        return redirect()->back()->with('success', 'fourthSubject deleted successfully!');

    }

}
