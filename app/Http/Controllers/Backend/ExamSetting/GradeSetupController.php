<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddGradePoint;
use App\Models\GradeSetup;
use Illuminate\Http\Request;

class GradeSetupController extends Controller
{
    public function grade_setup(Request $request, $school_code)
    {

        //$school_code = '100';

        $gradePointData = AddGradePoint::where('action', 'approved')->where('school_code', $school_code)->get();

        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();

        $classExamName = $request->session()->get('class_exam_name');
        $academic_year_name = $request->session()->get('academic_year_name');
        // dd($classExamName);

        $gradesetup = GradeSetup::where("school_code", $school_code)->get();

        // dd($gradesetup);


        return view('Backend/BasicInfo/ExamSetting/gradeSetup', compact('gradePointData', 'classData', 'academicYearData', 'classExamData', 'classExamName', 'academic_year_name', 'gradesetup'));
    }

    public function addGradeSetup(Request $request, $school_code)
    {
        return redirect()->route('set.grade.setup', $school_code)->with([
            'class_exam_name' => $request->class_exam_name,
            'academic_year_name' => $request->academic_year_name,
        ]);
    }

    public function saveGradeSetup(Request $request, $school_code)
    {

        $classExamName = $request->input('class_exam_name');
        $academicYearName = $request->input('academic_year_name');
        $classNames = $request->input('class_name');
        $key = $request->input('key');
        // Other input values
        $letterGrades = ($request->input('latter_grade'));
        // dd($letterGrade);
        $gradePoints = ($request->input('grade_point'));
        $markPoint1sts = ($request->input('mark_point_1st'));
        $markPoint2nds = ($request->input('mark_point_2nd'));
        $statuses = ($request->input('status'));
        $action = $request->input('action');
        //$school_code = "100";




        foreach ($classNames as $class) {
            foreach ($key as $id) {
                $gradeSetup = GradeSetup::where('school_code', $school_code)
                    ->where('class_exam_name', $classExamName)
                    ->where('academic_year_name', $academicYearName)
                    ->where('class_name', $class)
                    ->where('latter_grade', $letterGrades[$id])
                    ->first();

                if ($gradeSetup) {
                    // Update existing record
                    $gradeSetup->update([
                        'grade_point' => $gradePoints[$id],
                        'mark_point_1st' => $markPoint1sts[$id],
                        'mark_point_2nd' => $markPoint2nds[$id],
                        'status' => $statuses[$id],
                        'action' => $action
                    ]);
                } else {
                    // Create new record
                    $gradeSetup = new GradeSetup();
                    $gradeSetup->class_exam_name = $classExamName;
                    $gradeSetup->academic_year_name = $academicYearName;
                    $gradeSetup->class_name = $class;
                    $gradeSetup->latter_grade = $letterGrades[$id];
                    $gradeSetup->grade_point = $gradePoints[$id];
                    $gradeSetup->mark_point_1st = $markPoint1sts[$id];
                    $gradeSetup->mark_point_2nd = $markPoint2nds[$id];
                    $gradeSetup->status = $statuses[$id];
                    $gradeSetup->action = $action;
                    $gradeSetup->school_code = $school_code;
                    $gradeSetup->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Grade Setup added successfully!');
    }


    public function viewGradeSetup(Request $request, $school_code)
    {
        //$school_code = '100';
        // $grade=GradeSetup::all();
        // dd($grade->toArray());

        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();

        $classExamName = $request->session()->get('class_exam_name');
        $academic_year_name = $request->session()->get('academic_year_name');

        $gradeSetupData = GradeSetup::where('action', 'approved')->where('school_code', $school_code)->where('class_exam_name', $classExamName)->where('academic_year_name', $academic_year_name)->get();


        return view('Backend.BasicInfo.ExamSetting.viewGradeSetup', compact('academicYearData', 'classExamData', 'gradeSetupData'));
    }


    public function viewGradeSetupData(Request $request, $school_code)
    {
        // dd($request);
        return redirect()->route('viewGradeSetup', $school_code)->with([
            'class_exam_name' => $request->class_exam_name,
            'academic_year_name' => $request->academic_year_name,
        ]);


    }

}
