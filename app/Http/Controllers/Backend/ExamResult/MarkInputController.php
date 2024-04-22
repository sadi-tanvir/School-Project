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
        $student=null;
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $shiftData = AddShift::where('action', 'approved')->where('school_code', $school_code)->get();
        $subjectData = AddSubject::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        $gradeSetupData=null;
        return view('/Backend/ExamResult/exam_marks', compact('classData', 'groupData', 'sectionData', 'shiftData', 'subjectData', 'classExamData', 'academicYearData','student','gradeSetupData'));
    }
   


    
    public function generateExcelSheet(Request $request, $school_code) {
        $tableData = [
            'Student_name' => 'Student_name',
            'Student_id' => 'Student_id',
            'class_name' => 'class_name',
            'Shift' => 'Shift',
            'Section_name' => 'Section_name',
            'Group_name' => 'Group_name',
            'Roll' => 'Roll',
            'Subject' => 'Subject',
            'Exam_name' => 'Exam_name',
            'Year' => 'Year',
            'Full_marks' => 'Full_marks',
            'T-1=25/00' => 'T-1=25/00',
            'CQ=100/00' => 'CQ=100/00',
            'T.Marks' => 'T.Marks',
            'Grade' => 'Grade',
            'GPA' => 'GPA',
            'Absent' => 'Absent',
            'school_code' => 'school_code',
        ];
    
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        $headers = array_keys($tableData);
        $sheet->fromArray([$headers], NULL, 'A1');
    
        $data = array_values($tableData);
        $sheet->fromArray([$data], NULL, 'A2');
    
        $writer = new Xlsx($spreadsheet);
        $tempFilePath = tempnam(sys_get_temp_dir(), 'excel');
        $writer->save($tempFilePath);
        $fileContents = file_get_contents($tempFilePath);
        unlink($tempFilePath);
    
        return response($fileContents)
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->header('Content-Disposition', 'attachment; filename="table.xlsx"');
    }


    //Asma

    public function getGroups(Request $request,$school_code)
    {
        $class = $request->class;

        $groups = AddClassWiseGroup::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($groups);
    }

    public function getSections(Request $request,$school_code)
    {
        $class = $request->class;
        $sections = AddClassWiseSection::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($sections);
    }

    public function getShifts(Request $request,$school_code)
    {
        $class = $request->class;
        $shifts = AddClassWiseShift::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($shifts);
    }
    public function classExam(Request $request,$school_code)
    {
        $class = $request->class;
        $exams = SetShortCode::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($exams);
    }
    public function subject(Request $request,$school_code)
    {
        $class = $request->class;
        $subjects = AddClassWiseSubject::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($subjects);
    }
    
    public function finData(Request $request,$school_code){
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
        if($data){
            return redirect()->back()->with('error', 'Exam already published');
        }
        $student=Student::where('school_code', $school_code)->where('Class_name',$selectedClassName)->where('group',$selectedGroupName)->where('section',$selectedSectionName)->where('shift',$selectedShiftName)->where('year',$selectedYear)->get();
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $shiftData = AddShift::where('action', 'approved')->where('school_code', $school_code)->get();
        $subjectData = AddSubject::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        $shortCode=SetClassExamMark::where('class_name',$selectedClassName)->where('school_code', $school_code)->where('subject_name', $selectedSubjectName)->where('exam_name', $selectedExamName)->get();

        $gradeSetupData=GradeSetup::where('school_code',$school_code)->where('class_exam_name',$selectedExamName)->where('academic_year_name', $selectedYear)->where('class_name',$selectedClassName)->get();
//dd($gradeSetupData);
$gradeSetupData = $gradeSetupData->toJson();
        return view('/Backend/ExamResult/exam_marks',compact('classData', 'groupData', 'sectionData', 'shiftData', 'subjectData', 'classExamData', 'academicYearData','student','shortCode','selectedSubjectName','gradeSetupData'));

    }
}
