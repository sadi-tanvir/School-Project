<?php

namespace App\Http\Controllers\Backend\Student;

use App\Models\AddClassWiseShift;
use App\Models\AddGroup;
use App\Models\AddSection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddShift;
use App\Models\Student;
use Illuminate\Http\Request;

class UpdateStudentClassInfoController extends Controller
{
    public function studentClassInfo(Request $request, $schoolCode)
    {
        $student = null;
        //dd($studentData);
        $Year = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $Session = AddAcademicSession::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $shiftData = AddShift::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $categoryData = AddCategory::where('action', 'approved')->where('school_code', $schoolCode)->get();
        return view('Backend.Student.updateStudentClassInfo', compact('classData', 'groupData', 'sectionData', 'Year', 'Session', 'student', 'shiftData', 'categoryData'));
    }
    public function getStudentClassData(Request $request, $schoolCode)
    {
      
        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedYear = $request->input('year');

        $selectedCategory = $request->input('category');
        $selectedShift = $request->input('shift');
        $selectedStatus = $request->input('status');

        $selectedGender = $request->input('gender');

        $studentsQuery = Student::where('school_code', $schoolCode)
        ->where('action', 'approved')
        ->where('Class_name', $selectedClassName)
        ->where('year', $selectedYear);

    if ($request->group) {
        $studentsQuery->where('group', $selectedGroupName);
    }

    if ($request->section) {
        $studentsQuery->where('section', $selectedSectionName);
    }
    if ($request->category) {
        $studentsQuery->where('section', $selectedCategory);
    }
    if ($request->shift) {
        $studentsQuery->where('section', $selectedShift);
    }
    if ($request->status) {
        $studentsQuery->where('section', $selectedStatus);
    }

    if ($request->gender) {
        $studentsQuery->where('gender', $selectedGender);
    }

    $student = $studentsQuery->get();


        //dd($student);


        $Year = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $Session = AddAcademicSession::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $groupData = AddClassWiseGroup::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $sectionData = AddClassWiseSection::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $shiftData = AddShift::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $categoryData = AddCategory::where('action', 'approved')->where('school_code', $schoolCode)->get();

        if ($student->isNotEmpty()) {
            return view('Backend.Student.updateStudentClassInfo', compact('classData', 'groupData', 'sectionData', 'Year', 'Session', 'shiftData', 'categoryData', 'student'))->with([
                'success' => 'Subject update added successfully!',

            ]);
        }



        return redirect()->route('studentClassInfo', $schoolCode)->with('error', 'Student Data Not Found');
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

    public function updateStudentClass(Request $request, $schoolCode)
    {
        // dd($request->session);

        if ($request->id !== null) {

            foreach ($request->id as $id) {
                Student::where('id', $id)
                    ->update([
                        'Class_name' => $request->Class_name[$id] ?? $request->Class_name,
                        'group' => $request->group[$id] ?? $request->group,
                        'section' => $request->section[$id] ?? $request->section,
                        'year' => $request->year[$id] ?? $request->year,
                        'session' => $request->session[$id] ?? $request->session,
                        'status' => $request->status[$id] ?? $request->status,
                    ]);
            }
            return redirect()->route('studentClassInfo', $schoolCode)->with([
                'success' => 'Student update successfully!',
            ]);
        }
        return redirect()->route('studentClassInfo', $schoolCode)->with([
            'error' => 'No data selected!'
        ]);
    }


    public function deleteStudents(Request $request, $schoolCode)
    {
        // Validate that 'id' field is an array of integers
        $request->validate([
            'id' => 'required|array',
            'id.*' => 'integer',
        ]);

        // Retrieve the array of student IDs to delete
        $studentIds = $request->input('id');

        // Delete the students with the specified IDs
        Student::whereIn('id', $studentIds)->delete();

        // Redirect back with a success message
        return redirect()->route('studentClassInfo', $schoolCode)->with('success', 'Selected students have been deleted successfully.');
    }
}
