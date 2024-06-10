<?php

namespace App\Http\Controllers\Backend\ReportsExamsReports;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddGradePoint;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\AddShortCode;
use App\Models\AddSignature;
use App\Models\ExamMarkInput;
use App\Models\ExamProcess;
use App\Models\GradeSetup;
use App\Models\SchoolInfo;
use App\Models\SequentialExam;
use App\Models\SetShortCode;
use App\Models\SetSignature;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        // dd($request);
        // dd($merit_status);
        // Check if exam_process record exists
        $sequentialWiseExam = SequentialExam::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $class)->where('exam_name', $exam_name)->where('year', $year)->first();

        // dd($sequentialWiseExam);
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
            $student_ids = [];
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

            $existingRecords = [];
            $students = [];

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

                if ($existingRecord->isNotEmpty()) {
                    $existingRecords[] = $existingRecord;
                }


                if ($existingStudent->isNotEmpty()) {
                    $students[] = $existingStudent;
                }
            }
            // dd($students);


            $highestMarks = ExamMarkInput::where('school_code', $school_code)->where('action', 'approved')->select('subject', DB::raw('MAX(total_marks) as highest_marks'))->groupBy('subject')->get();
            // dd($highestMarks);
            $shortCode = SetShortCode::where('class_name', $class)->where('school_code', $school_code)->where('action', 'approved')->get();
            $grades = GradeSetup::where('school_code', $school_code)->where('action', 'approved')->get();

            $exam_process_data = [];
            if ($merit_status === "class_wise") {
                $exam_process_data = ExamProcess::where('class', $class)
                    ->where('group', $group)
                    ->where('exam_name', $exam_name)
                    ->where('merit_status', $merit_status)
                    ->where('year', $year)
                    ->where('school_code', $school_code)
                    ->where('action', 'approved')
                    ->get();
            } else if ($merit_status === "section_wise") {
                $exam_process_data = ExamProcess::where('class', $class)
                    ->where('group', $group)
                    ->where('section', $section)
                    ->where('exam_name', $exam_name)
                    ->where('merit_status', $merit_status)
                    ->where('year', $year)
                    ->where('school_code', $school_code)
                    ->where('action', 'approved')
                    ->get();
            }


            //dd($exam_process_data);

            // Sort exam process data
            $sorted_exam_process_data = $exam_process_data->sort(function ($a, $b) {
                if ($a->total_gpa == $b->total_gpa) {
                    if ($a->total_marks == $b->total_marks) {
                        return $a->student_roll <=> $b->student_roll;
                    }
                    return $a->total_marks <=> $b->total_marks;
                }
                return $a->total_gpa <=> $b->total_gpa;
            })->values(); // Reindex the collection

            // Assign positions to students
            foreach ($sorted_exam_process_data as $index => $data) {
                if ($data->total_gpa == 0) {
                    $data->position = 0;
                } else {
                    $data->position = $index + 1;
                }
            }

            // dd($sorted_exam_process_data);

            $gradePoints = AddGradePoint::where('school_code', $school_code)->where('action', 'approved')->get();
            $schoolInfo = SchoolInfo::where('school_code', $school_code)->first();
            $signatures = AddSignature::where('school_code', $school_code)->where('action', 'approved')->get();
            //dd($signatures);


            return view('/Backend/Report(exam&result)/downloadProgressReport', compact('existingRecords', 'shortCode', 'students', 'class', 'group', 'section', 'exam_name', 'merit_status', 'year', 'highestMarks', 'grades', 'exam_name', 'sequentialWiseExam', 'sorted_exam_process_data', 'gradePoints', 'schoolInfo', 'signatures'));
        } else {
            return redirect()->back()->with('error', 'Not found');
        }
    }





    public function downloadProgressReport($school_code)
    {
        return view('/Backend/Report(exam&result)/downloadProgressReport');
    }


}