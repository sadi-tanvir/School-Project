<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddClassWiseShift;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\Student;
use Illuminate\Http\Request;

class UpdateStudentBasicInfoController extends Controller
{
    public function updateStudentBasicInfo(Request $request, $schoolCode)
    {
        $student = null;
        //dd($studentData);
        $Year = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $Session = AddAcademicSession::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $schoolCode)->get();
        return view('Backend.Student.updateStudentBasicInfo', compact('classData', 'groupData', 'sectionData', 'Year', 'Session', 'student'));
    }
    public function getStudentData(Request $request, $schoolCode)
    {
    
        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedYear = $request->input('year');
        $selectedSesion = $request->input('session');
        $selectedGender= $request->input('gender');

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

    if ($request->gender) {
        $studentsQuery->where('gender', $selectedGender);
    }

    $student = $studentsQuery->get();

      

       
        $Year = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $Session = AddAcademicSession::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $groupData = AddClassWiseGroup::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $sectionData = AddClassWiseSection::where('action', 'approved')->where('school_code', $schoolCode)->get();

        if ($student->isNotEmpty()) {
            return view('Backend.Student.updateStudentBasicInfo', compact('classData', 'groupData', 'sectionData', 'Year', 'Session','student'))->with([
                'success' => 'Student found successfully!',
                'class_name' => $request->class_name,
                'group' => $request->group,
                'section' => $request->section,
                'year' => $request->year,
                'session' => $request->session,
    
            ]);
          
        }

            return redirect()->route('updateStudentBasicInfo',$schoolCode)->with('error','Student Data Not Found');
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

    public function updateStudentBasic(Request $request, $schoolCode)
{
    if ($request->has('id')) {
        foreach ($request->id as $id) {
            Student::where('id', $id)->update([
                'student_roll' => $request->input('student_roll')[$id],
                'student_id' => $request->input('student_id')[$id],
                'name' => $request->input('name')[$id],
                'father_name' => $request->input('father_name')[$id],
                'father_nid' => $request->input('father_nid')[$id],
                'mother_name' => $request->input('mother_name')[$id],
                'mother_nid' => $request->input('mother_nid')[$id],
                'birth_date' => $request->input('birth_date')[$id],
                'gender' => $request->input('gender')[$id],
                'religious' => $request->input('religious')[$id],
                'blood_group' => $request->input('blood_group')[$id],
                'mobile_no' => $request->input('mobile_no')[$id],
            ]);
        }
        
        return redirect()->route('updateStudentBasicInfo', $schoolCode)->with('success', 'Students updated successfully!');
    }

    return redirect()->route('updateStudentBasicInfo', $schoolCode)->with('error', 'No data selected!');
}








public function uploadStudentPhoto(){
    return view('Backend.Student.updateUploadPhoto');
}
}
