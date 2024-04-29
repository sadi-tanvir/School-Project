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
use App\Models\SchoolInfo;
use App\Models\SetClassExamMark;
use App\Models\SetShortCode;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
        $markInputData = ExamMarkInput::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('subject', $selectedSubjectName)->where('year', $selectedYear)->exists();


        if ($markInputData) {
            $markInputs = ExamMarkInput::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('year', $selectedYear)->where('subject', $selectedSubjectName)->get();
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
            $shortMarks = [];
            foreach ($request->short_marks as $shortCode => $marksArray) {
                $shortMarks[$shortCode] = $marksArray[$id];
            }
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
            $status = $request->input("status.$key", 'present'); 
    
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



    public function printBlankExam(Request $request,$school_code){
    $selectedClassName = $request->input('class_name');
    $selectedGroupName = $request->input('group');
    $selectedSectionName = $request->input('section');
    $selectedShiftName = $request->input('shift');
    $selectedSubjectName = $request->input('subject');
    $selectedExamName = $request->input('exam');
    $selectedYear = $request->input('year');
    $fullMarks=$request->input('full_marks');
    $totalMarks=$request->input('total_mark');
    $passMarks = $request->input('pass_mark');
    $schoolInfo=SchoolInfo::where('school_code',$school_code)->get();
 
    $students = Student::where('school_code',$school_code)->where('Class_name', $selectedClassName)
    ->where('group', $selectedGroupName)
    ->where('section', $selectedSectionName)
    ->where('shift', $selectedShiftName)
    ->where('year', $selectedYear)
    ->get();
    $date = date('d-m-Y');
    $shortCodes = SetClassExamMark::where('class_name', $selectedClassName)->where('school_code', $school_code)->where('subject_name', $selectedSubjectName)->where('exam_name', $selectedExamName)->get();

return view('/Backend/ExamResult/exam_marks_print',compact('selectedClassName','selectedGroupName','selectedSectionName','selectedShiftName','selectedSubjectName','selectedExamName','selectedYear','shortCodes','fullMarks','totalMarks','passMarks','students','schoolInfo','date'));
    }


    
public function downloadExcel(Request $request)
{
    // Retrieve inputs from the request
    $selectedClassName = $request->input('class_name');
    $selectedGroupName = $request->input('group');
    $selectedSectionName = $request->input('section');
    $selectedShiftName = $request->input('shift');
    $selectedSubjectName = $request->input('subject');
    $selectedExamName = $request->input('exam');
    $selectedYear = $request->input('year');
    $shortCodes = $request->input('shortCode');
    $fullMarks = $request->input('full_marks');
    $totalMarks = $request->input('total_mark');
    $passMarks = $request->input('pass_mark');
    // dd($passMarks);
    if ($shortCodes === null || empty($shortCodes) ||
        $totalMarks === null || empty($totalMarks) ||
        $passMarks === null || empty($passMarks)) {
        return response()->json(['error' => 'Short codes, total marks, or pass marks are missing or empty.']);
    }
    // Instantiate the Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set headers
    $sheet->setCellValue('A1', 'SL');
    $sheet->setCellValue('B1', 'Student Name');
    $sheet->setCellValue('C1', 'Student ID');
    $sheet->setCellValue('D1', 'Full Marks');
    $sheet->setCellValue('E1', 'T.Marks');
    $columnIndex = 6;
    foreach ($shortCodes as $index => $code) {
        $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
        $sheet->setCellValue($columnLetter . '1', $code . '=' . $totalMarks[$index] . '/' . $passMarks[$index]);
        $columnIndex++;
    }
    $students = Student::where('Class_name', $selectedClassName)
                        ->where('group', $selectedGroupName)
                        ->where('section', $selectedSectionName)
                        ->where('shift', $selectedShiftName)
                        ->where('year', $selectedYear)
                        ->get();
    $row = 2;
    foreach ($students as $key => $student) {
        $sheet->setCellValue('A' . $row, $key + 1);
        $sheet->setCellValue('B' . $row, $student->name);
        $sheet->setCellValue('C' . $row, $student->student_id);
        $sheet->setCellValue('D' . $row, $fullMarks);
        $columnIndex = 6;
        foreach ($shortCodes as $index => $code) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
            $studentMarks = ''; 
            $sheet->setCellValue($columnLetter . $row, $studentMarks);
            $columnIndex++;
        }
        $row++;
    }
    $fileName = 'Mark_input.xlsx';
    $writer = new Xlsx($spreadsheet);
    $writer->save($fileName);
    return response()->download($fileName)->deleteFileAfterSend(true);
}


}

