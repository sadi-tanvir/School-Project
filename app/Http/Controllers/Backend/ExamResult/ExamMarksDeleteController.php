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

class ExamMarksDeleteController extends Controller
{
    public function exam_marks_delete($school_code)
    {
        $markInputs = null;
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $subjectData = AddSubject::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        return view('/Backend/ExamResult/exam_marks_delete', compact('classData', 'subjectData', 'groupData', 'sectionData', 'classExamData', 'academicYearData', 'markInputs'));
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
        $selectedClassName = $request->input('class');
        $selectedGroupName = $request->input('group');
        $selectedSectionName = $request->input('section');
        $selectedSubjectName = $request->input('subject');
        $selectedExamName = $request->input('exam');
        $selectedYear = $request->input('year');

        $markInputs =  ExamMarkInput::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $selectedClassName)->where('group', $selectedGroupName)->where('section', $selectedSectionName)->where('subject', $selectedSubjectName)->where('year', $selectedYear)->get();

        //dd($markInputs);

        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
        $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
        $subjectData = AddSubject::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();

        return view('/Backend/ExamResult/exam_marks_delete', compact('classData', 'selectedYear', 'selectedClassName',  'selectedSectionName', 'selectedExamName', 'selectedGroupName', 'groupData', 'sectionData', 'subjectData', 'classExamData', 'academicYearData', 'selectedSubjectName', 'markInputs'));
    }
    public function deleteMarks(Request $request, $school_code)
{
    $selectedIds = $request->input('selected_ids');

    // Retrieve the records to be updated
    $marks = ExamMarkInput::where('school_code', $school_code)
                          ->whereIn('id', $selectedIds)
                          ->get();

    // Check if any records were retrieved
    if ($marks->isEmpty()) {
        return redirect()->back()->with('error', 'No records found for deletion.');
    }

    // Update each record
    foreach ($marks as $mark) {
        // Decode the JSON string to an associative array
        $shortCodeArray = json_decode($mark->short_marks, true);

        // Update each value to "0"
        foreach ($shortCodeArray as $key => $value) {
            $shortCodeArray[$key] = "0";
        }

        $updatedShortCode = json_encode($shortCodeArray);
// dd($updatedShortCode);
        // Update the record with the new short_code value
        $mark->update([
            'total_marks' => 0,
            'grade' => 'F',
            'gpa' => 0,
            'short_marks' => $updatedShortCode
        ]);
    }

    return redirect()->back()->with('success', 'Exam Marks Successfully deleted');
}

}
