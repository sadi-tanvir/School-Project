<?php

namespace App\Http\Controllers\Backend\ReportsExamsReports;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddSection;
use App\Models\AddGroup;
use App\Models\ExamMarkInput;
use App\Models\ExamProcess;
use App\Models\SchoolInfo;
use App\Models\SequentialExam;
use App\Models\Student;
use Illuminate\Http\Request;

class TebulationsFormat1Controller extends Controller
{
    public function format1($schoolCode)
    {
        $classes = AddClass::where("action", "approved")->where("school_code", $schoolCode)->get();
        $sections = AddSection::where("action", "approved")->where("school_code", $schoolCode)->get();
        $groups = AddGroup::where("action", "approved")->where("school_code", $schoolCode)->get();
        $examName = AddClassExam::where("action", "approved")->where("school_code", $schoolCode)->get();
        $years = AddAcademicYear::where("action", "approved")->where("school_code", $schoolCode)->get();
        return view('/Backend/Report(exam&result)/format1', compact('classes', 'sections', 'groups', 'examName', 'years'));
    }

    public function tabulation1(Request $request, $school_code)
    {
        $year = $request->year;
        $class = $request->class;
        $group = $request->group;
        $section = $request->section;
        $exam = $request->exam_name;
        $merit_status=$request->merit_status;
        //dd($merit_status);
        $subjects = ExamMarkInput::
            select('subject')
            ->distinct()
            ->get()
            ->pluck('subject')
            ->toArray();

        $students = ExamMarkInput::
            select('student_id', 'name', 'class_name', 'section', 'student_roll', 'subject', 'total_marks')
            ->get();
            $studentsGrouped = $students->groupBy('student_id');
// dd($studentsGrouped);
            $results = [];
            foreach ($studentsGrouped as $studentId => $studentMarks) {
                $studentData = [
                    'student_id' => $studentMarks[0]->student_id,
                    'name' => $studentMarks[0]->name,
                    'class_name' => $studentMarks[0]->class_name,
                    'section' => $studentMarks[0]->section,
                    'roll' => $studentMarks[0]->student_roll,
                    'total' => $studentMarks->sum('total_marks'),
                    'subjects' => []
                ];
        
                foreach ($subjects as $subject) {
                    $subjectMark = $studentMarks->firstWhere('subject', $subject);
                    $studentData['subjects'][$subject] = $subjectMark ? $subjectMark->total_marks : 0;
                }
        
                $results[] = $studentData;
            }
            usort($results, function ($a, $b) {
                return $b['total'] <=> $a['total'];
            });
        
            foreach ($results as $key => &$result) {
                $result['merit'] = $key + 1;
            }

        $count = Student::where("action", "approved")->where("school_code", $school_code)->where("year", $year)->where("Class_name", $class)->where("group", $group)->where("section", $section)->count();
        $school_info = SchoolInfo::where('school_code', $school_code)->first();
// merit Status
        $exam_process_data = [];
        if ($merit_status === "class_wise") {

            $exam_process_data = ExamProcess::where('class', $class)
                ->where('school_code', $school_code)
                ->where('action', 'approved')
                ->where('group', $group)
                ->where('exam_name', $exam)
                ->where('merit_status', $merit_status)
                ->where('year', $year)
                ->get();

        } else if ($merit_status === "section_wise") {
            $exam_process_data = ExamProcess::where('class', $class)
                ->where('group', $group)
                ->where('section', $section)
                ->where('exam_name', $exam)
                ->where('merit_status', $merit_status)
                ->where('year', $year)
                ->where('school_code', $school_code)
                ->where('action', 'approved')
                ->get();
        }


        $sequentialWiseExam = SequentialExam::where('class_name', $class)->where('exam_name', $exam)->where('year', $year)->first();
        // dd($sequentialWiseExam);

        if ($sequentialWiseExam->sequential_exam === "Grade-TotalMark-Roll") {
            $sorted_exam_process_data = $exam_process_data->sort(function ($a, $b) {
                if ($a->total_gpa == $b->total_gpa) {
                    if ($a->total_marks == $b->total_marks) {
                        return $b->student_roll <=> $a->student_roll;
                    }

                    return $b->total_marks <=> $a->total_marks;
                }
                return $b->total_gpa <=> $a->total_gpa;
            })->values(); // Reindex the collection

            // Assign positions to students
            foreach ($sorted_exam_process_data as $index => $data) {
                if ($data->total_gpa == 0) {
                    $data->position = 0;
                } else {
                    $data->position = $index + 1;
                }
            }
        } else if ($sequentialWiseExam->sequential_exam === "TotalMark-Grade-Roll") {
            $sorted_exam_process_data = $exam_process_data->sort(function ($a, $b) {
                if ($a->total_marks == $b->total_marks) {
                    if ($a->total_gpa == $b->total_gpa) {
                        return $b->student_roll <=> $a->student_roll;
                    }
                    return $b->total_gpa <=> $a->total_gpa;
                }
                return $b->total_marks <=> $a->total_marks;
            })->values(); // Reindex the collection

            // Assign positions to students
            foreach ($sorted_exam_process_data as $index => $data) {
                if ($data->total_gpa == 0) {
                    $data->position = 0;
                } else {
                    $data->position = $index + 1;
                }
            }
        } else if ($sequentialWiseExam->sequential_exam === "TotalMark-Roll-Grade") {
            $sorted_exam_process_data = $exam_process_data->sort(function ($a, $b) {
                if ($a->total_marks == $b->total_marks) {
                    if ($a->student_roll == $b->student_roll) {
                        return $b->total_gpa <=> $a->total_gpa;
                    }
                    return $b->student_roll <=> $a->student_roll;
                }
                return $b->total_marks <=> $a->total_marks;
            })->values(); // Reindex the collection

            // Assign positions to students
            foreach ($sorted_exam_process_data as $index => $data) {
                if ($data->total_gpa == 0) {
                    $data->position = 0;
                } else {
                    $data->position = $index + 1;
                }
            }
        } else if ($sequentialWiseExam->sequential_exam === "Roll-TotalMark-Grade") {
            $sorted_exam_process_data = $exam_process_data->sort(function ($a, $b) {
                if ($a->student_roll == $b->student_roll) {
                    if ($a->total_marks == $b->total_marks) {
                        return $b->total_gpa <=> $a->total_gpa;
                    }
                    return $b->total_marks <=> $a->total_marks;
                }
                return $b->student_roll <=> $a->student_roll;
            })->values(); // Reindex the collection

            // Assign positions to students
            foreach ($sorted_exam_process_data as $index => $data) {
                if ($data->total_gpa == 0) {
                    $data->position = 0;
                } else {
                    $data->position = $index + 1;
                }
            }
        } else {
            $sorted_exam_process_data = $exam_process_data->sort(function ($a, $b) {
                if ($a->total_gpa == $b->total_gpa) {
                    if ($a->total_marks == $b->total_marks) {
                        return $b->student_roll <=> $a->student_roll;
                    }
                    return $b->total_marks <=> $a->total_marks;
                }
                return $b->total_gpa <=> $a->total_gpa;
            })->values(); // Reindex the collection

            // Assign positions to students
            foreach ($sorted_exam_process_data as $index => $data) {
                if ($data->total_gpa == 0) {
                    $data->position = 0;
                } else {
                    $data->position = $index + 1;
                }
            }
        }
 
        return view('/Backend/Report(exam&result)/downloadformat1', compact('school_info','sorted_exam_process_data', 'year', 'class', 'group', 'section', 'exam', 'count', 'subjects','results'));
    }
    
}
