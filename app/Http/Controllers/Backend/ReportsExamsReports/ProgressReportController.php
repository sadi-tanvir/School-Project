<?php

namespace App\Http\Controllers\Backend\ReportsExamsReports;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\AddShortCode;
use App\Models\ExamMarkInput;
use App\Models\ExamProcess;
use App\Models\SetShortCode;
use App\Models\Student;
use Illuminate\Http\Request;

class ProgressReportController extends Controller
{
    public function progressReport($school_code)
    {
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        return view('/Backend/Report(exam&result)/progressReport', compact('classData', 'groupData', 'sectionData', 'classExamData', 'academicYearData'));
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

    public function progressStudent(Request $request, $school_code)
    {
        // Retrieve all request parameters
        $class = $request->class;
        $group = $request->group;
        $section = $request->section;
        $student_id = $request->student_id;
        $exam_name = $request->exam_name;
        $merit_status = $request->merit_status;
        $year = $request->year;
    
        // Check if exam_process record exists
        $exam_process_exists = ExamProcess::where('class', $class)
            ->where('group', $group)
            ->where('section', $section)
            ->where('exam_name', $exam_name)
            ->where('merit_status', $merit_status)
            ->where('year', $year)
            ->where('school_code', $school_code)
            ->where('action', 'approved')
            ->exists();
    
        if ($exam_process_exists) {
            // Initialize the array to hold student IDs
            $student_ids = [];
    
            // Check if student_id is null
            if (is_null($student_id)) {
                // Retrieve student IDs from the ExamProcess table based on class, section, group, year, and merit_status
                $student_ids = ExamProcess::where('class', $class)
                    ->where('group', $group)
                    ->where('section', $section)
                    ->where('year', $year)
                    ->where('merit_status', $merit_status)
                    ->where('school_code', $school_code)
                    ->where('action', 'approved')
                    ->pluck('student_id')
                    ->toArray(); // Convert collection to array
            } else {
                // If student_id is not null, add it to the array
                $student_ids[] = $student_id;
            }
    
            // Initialize arrays to hold existing records and students
            $existingRecords = [];
            $students = [];
    
            // Loop through each student ID and retrieve the records
            foreach ($student_ids as $id) {
                // Retrieve existing records from ExamMarkInput table
                $existingRecord = ExamMarkInput::where('student_id', $id)
                    ->where('class_name', $class)
                    ->where('group', $group)
                    ->where('section', $section)
                    ->where('exam_name', $exam_name)
                    ->where('year', $year)
                    ->where('school_code', $school_code)
                    ->where('action', 'approved')
                    ->get();
    
                $existingStudent = Student::where('student_id', $id)
                    ->where('class_name', $class)
                    ->where('group', $group)
                    ->where('section', $section)
                    ->where('year', $year)
                    ->where('school_code', $school_code)
                    ->get();
    
                // Add the existing records and students to their respective arrays
                if ($existingRecord->isNotEmpty()) {
                    $existingRecords[] = $existingRecord;
                }
                if ($existingStudent->isNotEmpty()) {
                    $students[] = $existingStudent;
                }
            }
    $shortCode=SetShortCode::where('class_name', $class)->where('school_code', $school_code)->where('action', 'approved')->get();
            // Pass the retrieved data to the view
            return view('/Backend/Report(exam&result)/downloadProgressReport', compact('existingRecords','shortCode', 'students', 'class', 'group', 'section', 'exam_name', 'merit_status', 'year'));
        } 
        else {
            return redirect()->back()->with('error', 'Not found');
        }
    }
    
    

    public function downloadProgressReport($school_code)
    {
        return view('/Backend/Report(exam&result)/downloadProgressReport');
    }


}
