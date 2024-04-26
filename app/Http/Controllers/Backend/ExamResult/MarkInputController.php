<?php

namespace App\Http\Controllers\Backend\ExamResult;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddClassWiseShift;
use App\Models\AddClassWiseSubject;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\AddShift;
use App\Models\AddSubject;
use App\Models\ExamMarkInput;
use App\Models\ExamPublish;
use App\Models\GradeSetup;
use App\Models\SetClassExamMark;
use App\Models\SetShortCode;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MarkInputController extends Controller
{

    public function exam_marks($school_code)
    {
        $student = null;
        $markInputData = null;
        $markInputs = null;
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $shiftData = AddShift::where('action', 'approved')->where('school_code', $school_code)->get();
        $subjectData = AddSubject::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        $gradeSetupData = null;
        return view('/Backend/ExamResult/exam_marks', compact('classData', 'groupData', 'sectionData', 'shiftData', 'subjectData', 'classExamData', 'academicYearData', 'student', 'gradeSetupData', 'markInputData', 'markInputs'));
    }






    //Asma

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
    public function classExam(Request $request, $school_code)
    {
        $class = $request->class;
        $exams = SetShortCode::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($exams);
    }
    public function subject(Request $request, $school_code)
    {
        $class = $request->class;
        $subjects = AddClassWiseSubject::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($subjects);
    }

    public function finData(Request $request, $school_code)
    {
        $selectedClassName = $request->input('class_name');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedShiftName = $request->input('shift');
        $selectedSubjectName = $request->input('subject');
        $selectedExamName = $request->input('exam');
        $selectedYear = $request->input('year');

        $data = ExamPublish::where('action', 'approved')
            ->where('school_code', $school_code)
            ->where('Class_name', $selectedClassName)
            ->where('exam_name', $selectedExamName)
            ->where('year', $selectedYear)
            ->exists();
        if ($data) {
            return redirect()->back()->with('error', 'Exam already published');
        }

        $markInputs = null;
        $markInputData = ExamMarkInput::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('section', $selectedSectionName)->where('year', $selectedYear)->exists();


        if ($markInputData) {
            $markInputs = ExamMarkInput::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('section', $selectedSectionName)->where('year', $selectedYear)->where('subject', $selectedSubjectName)->get();
        }

        // dd($markInputs);
        $student = Student::where('school_code', $school_code)->where('Class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('shift', $selectedShiftName)->where('year', $selectedYear)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $shiftData = AddShift::where('action', 'approved')->where('school_code', $school_code)->get();
        $subjectData = AddSubject::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        $shortCode = SetClassExamMark::where('class_name', $selectedClassName)->where('school_code', $school_code)->where('subject_name', $selectedSubjectName)->where('exam_name', $selectedExamName)->get();

        $gradeSetupData = GradeSetup::where('school_code', $school_code)->where('class_exam_name', $selectedExamName)->where('academic_year_name', $selectedYear)->where('class_name', $selectedClassName)->get();
        //dd($gradeSetupData);
        $gradeSetupData = $gradeSetupData->toJson();

        // dd($markInputData);


        return view('/Backend/ExamResult/exam_marks', compact('classData', 'selectedYear', 'selectedClassName', 'selectedShiftName', 'selectedSectionName', 'selectedExamName', 'selectedGroupName', 'groupData', 'sectionData', 'shiftData', 'subjectData', 'classExamData', 'academicYearData', 'student', 'shortCode', 'selectedSubjectName', 'gradeSetupData', 'markInputData', 'markInputs'));
    }

    public function marksInput(Request $request)
    {
        //dd($request);
        $exam = $request->input('exam');
        $year = $request->input('year');
        $shift = $request->input('shift');
        $section = $request->input('section');
        $group = $request->input('group');
        $class_name = $request->input('class');
        $subject = $request->input('subject');
        $school_code = $request->input('school_code');
        $key = $request->input('key');

        foreach ($key as $id) {
            //dd($id);
            $marks = new ExamMarkInput();
            $marks->name = $request->name[$id];
            $marks->student_id = $request->student_id[$id];
            $marks->student_roll = $request->student_roll[$id];
            $marks->class_name = $class_name;
            $marks->subject = $subject;
            $marks->exam_name = $exam;
            $marks->shift = $shift;
            $marks->section = $section;
            $marks->group = $group;
            $marks->year = $year;
            $marks->school_code = $school_code;
            $marks->full_marks = $request->full_marks[$id];
            // Get short code and marks data
            $shortMarks = [];
            foreach ($request->short_marks as $shortCode => $marksArray) {
                $shortMarks[$shortCode] = $marksArray[$id];
            }
            // Convert shortMarks array to JSON and save it
            $marks->short_marks = json_encode($shortMarks);

            $marks->total_marks = $request->total_marks[$id];
            $marks->grade = $request->grade[$id];
            $marks->gpa = $request->gpa[$id];
            if (isset($request->status[$id])) {
                $marks->status = $request->status[$id];
            } else {
                $marks->status = 'present';
            }
            $marks->save();

        }
        return redirect()->back()->with('success', 'Exam Marks Input Successfully');
    }

    public function updateMarkInput(Request $request)
    {
        $exam = $request->input('exam');
        $year = $request->input('year');
        $shift = $request->input('shift');
        $section = $request->input('section');
        $group = $request->input('group');
        $class_name = $request->input('class');
        $subject = $request->input('subject');
        $school_code = $request->input('school_code');
        $keys = $request->input('key');
        
        foreach ($keys as $key) {
            $name = $request->input("name.$key");
            $student_id = $request->input("student_id.$key");
            $student_roll = $request->input("student_roll.$key");
            $full_marks = $request->input("full_marks.$key");
            $total_marks = $request->input("total_marks.$key");
            $grade = $request->input("grade.$key");
            $gpa = $request->input("gpa.$key");
            $status = $request->input("status.$key", 'present'); // Set default value if status is null
    
            $shortMarks = [];
            foreach ($request->short_marks as $shortCode => $marksArray) {
                $shortMarks[$shortCode] = $marksArray[$key];
            }
    
            ExamMarkInput::where('id', $key)->update([
                'name' => $name,
                'student_id' => $student_id,
                'student_roll' => $student_roll,
                'full_marks' => $full_marks,
                'total_marks' => $total_marks,
                'grade' => $grade,
                'gpa' => $gpa,
                'status' => $status,
                'short_marks' => json_encode($shortMarks), 
            ]);
        }
        return redirect()->back()->with('success','Updated Successfully');
    }
    
}
