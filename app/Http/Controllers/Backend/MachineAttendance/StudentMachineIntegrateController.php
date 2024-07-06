<?php

namespace App\Http\Controllers\Backend\MachineAttendance;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\Student;
use App\Models\StudentMachineIntegrate;
use Illuminate\Http\Request;

class StudentMachineIntegrateController extends Controller
{
    public function viewMachineIntegrade($school_code)
    {
        $class = null;
        $group = null;
        $section = null;
        $students = null;
        $counts = 0;
        $classes = AddClass::where('school_code', $school_code)->where('action', 'approved')->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();

        return view('Backend.MachineAttendence.stdMachineIntegrate', compact('classes', 'groupData', 'sectionData', 'class', 'group', 'section', 'students', 'counts'));
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

    public function getData(Request $request, $school_code)
    {
        // dd($request);
        $class = $request->class;
        $group = $request->group;
        $section = $request->section;
        $counts = 0;
        
            $studentsQuery = Student::where('school_code', $school_code)->where('action', 'approved');
            if (!empty($class)) {
                $studentsQuery = $studentsQuery->where('Class_name', $class);
            }

            if (!empty($group)) {
                $studentsQuery = $studentsQuery->where('group', $group);
            }
            if (!empty($section)) {
                $studentsQuery = $studentsQuery->where('section', $section);
            }
            $students = $studentsQuery->get();
            $counts = $students->count();
        $classes = AddClass::where('school_code', $school_code)->where('action', 'approved')->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();

        return view('Backend.MachineAttendence.stdMachineIntegrate', compact('classes', 'groupData', 'sectionData', 'students', 'class', 'group', 'section', 'counts', ))->with('success', 'Machine Integrate successfully');
    }

    public function SaveStudentMachineIntegrate(Request $request, $school_code)
    {
        $data = $request->all();
        // dd($data);
        foreach ($data['student_id'] as $key => $studentId) {
            StudentMachineIntegrate::updateOrCreate(
                ['student_id' => $studentId],
                [
                    'machine_user_id' => isset($data['same_student_id'][$studentId])
                        ? $studentId
                        : $data['machine_user_id'][$key],
                    'student_name' => $data['student_name'][$key],
                    'student_roll' => $data['student_roll'][$key],
                    'class' => $data['class'],
                    'section' => $data['section'],
                    'group' => $data['group'],
                    'school_code' => $school_code,
                ]
            );
        }

        $classes = AddClass::where('school_code', $school_code)->where('action', 'approved')->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();

        $class = $request->class;
        $group = $request->group;
        $section = $request->section;

        $studentsQuery = Student::where('school_code', $school_code)->where('action', 'approved');

        if (!empty($class)) {
            $studentsQuery = $studentsQuery->where('Class_name', $class);
        }

        if (!empty($group)) {
            $studentsQuery = $studentsQuery->where('group', $group);
        }
        if (!empty($section)) {
            $studentsQuery = $studentsQuery->where('section', $section);
        }

        $students = $studentsQuery->get();
        return redirect()->route('student.machine.integrate.get.data', $school_code)
            ->with('classes', $classes)
            ->with('groupData', $groupData)
            ->with('sectionData', $sectionData)
            ->with('students', $students)
            ->with('class', $class)
            ->with('group', $group)
            ->with('section', $section)
            ->with('success', 'Machine Integrated Successfully');
    }


}
