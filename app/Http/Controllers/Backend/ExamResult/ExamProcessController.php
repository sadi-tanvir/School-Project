<?php

namespace App\Http\Controllers\Backend\ExamResult;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\ExamProcess;
use App\Models\Student;
use Illuminate\Http\Request;

class ExamProcessController extends Controller
{
    public function exam_process($school_code)
    {
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        return view('/Backend/ExamResult/exam_process', compact('classData', 'groupData', 'sectionData', 'classExamData', 'academicYearData'));
    }

    public function getStudents(Request $request, $schoolCode, $classValue, $groupValue, $sectionValue)
    {
        // Fetch students based on the selected class, group, and section
        $students = Student::where('class_name', $classValue)
            ->where('group', $groupValue)
            ->where('section', $sectionValue)
            ->where('school_code', $schoolCode)
            ->pluck('student_roll', 'student_roll');

        // You may return the students as JSON response or in any suitable format
        return response()->json($students);
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
    public function getStudent(Request $request, $school_code)
    {
        $class = $request->class;
        $student = Student::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($student);
    }


    public function examProcess(Request $request, $school_code)
    {
        // Retrieve all request parameters
        $class = $request->class;
        $group = $request->group;
        $section = $request->section;
        $student_id = $request->student_id;
        $exam_name = $request->exam_name;
        $merit_status = $request->merit_status;
        $year = $request->year;
    
        // Initialize the array to hold student IDs
        $student_ids = [];
    
        // Check if student_id is null
        if (is_null($student_id)) {
            // Retrieve student IDs from the students table based on class, section, group, and year
            $student_ids = Student::where('Class_name', $class)
                ->where('group', $group)
                ->where('section', $section)
                ->where('year', $year)
                ->pluck('student_id'); // Assuming the primary key is 'student_id'
        } else {
            // If student_id is not null, add it to the array
            $student_ids[] = $student_id;
        }
    
        // Loop through each student ID and save or update the record
        foreach ($student_ids as $id) {
            // Check if the record already exists
            $existingRecord = ExamProcess::where('student_id', $id)
                ->where('exam_name', $exam_name)
                ->where('year', $year)
                ->first();
    
            if ($existingRecord) {
                // Update the existing record
                $existingRecord->update([
                    'class' => $class,
                    'group' => $group,
                    'section' => $section,
                    'merit_status' => $merit_status,
                    'status' => 'active',
                    'action' => 'approved',
                    'school_code' => $school_code,
                ]);
            } else {
                // Create a new record
                ExamProcess::create([
                    'class' => $class,
                    'group' => $group,
                    'section' => $section,
                    'student_id' => $id,
                    'exam_name' => $exam_name,
                    'merit_status' => $merit_status,
                    'year' => $year,
                    'status' => 'active',
                    'action' => 'approved',
                    'school_code' => $school_code,
                ]);
            }
        }
    
        return redirect()->back()->with('success', 'Exam Process complete successfully!');
    }
    

}
