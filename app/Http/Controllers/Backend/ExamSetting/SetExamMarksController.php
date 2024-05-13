<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;

use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSubject;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\AddShift;
use App\Models\SetClassExamMark;
use App\Models\SetShortCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SetExamMarksController extends Controller
{


    public function set_exam_marks(Request $request, $schoolCode)
    {
        //$school_code = '100';
        $searchClassData = null;
        $searchClassExamName = null;
        $searchAcademicYearName = null;
        $setCodeData = null;
        $shortCodeData = null;

        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();



        $className = $request->input('class_name');
        $classExamName = $request->input('class_exam_name');
        $academic_year_name = $request->input('academic_year_name');
        $school_code = $request->input('school_code');


        $searchClassses = AddClassWiseSubject::where("school_code", $school_code)->where("action", "approved")->where('class_name', $className)->get();

        // dd($searchClassses);


        $shortCodes = SetShortCode::where('school_code', $school_code)->where('action', 'approved')->where('class_name', $className)->where('class_exam_name', $classExamName)->where('academic_year_name', $academic_year_name)->get();

        // $subjects=AddClassWiseSubject::where('school_code',$schoolCode)->where('action', 'approved')->where('class_name',$className)->get();
        // return redirect()->route('saveSetExamMarks',$schoolCode)->with([
        //     'classData' => $request->classData,
        //     'classExamData' => $request->classExamData,
        //     'academicYearData' => $request->academicYearData,
        //     'searchClassData' => $request->searchClassData,
        //     'searchClassExamName' => $request->searchClassExamName,
        //     'searchAcademicYearName' => $request->searchAcademicYearName,
        //     'searchClassses' => $request->searchClassses,
        //     'shortCodes' => $request->shortCodes,
        //     'className' => $request->className,
        //     'classExamName' => $request->classExamName,
        //     'academic_year_name' => $request->academic_year_name,

        // ]);
        return view('Backend/BasicInfo/ExamSetting/classSetExamMarks', compact('classData', 'classExamData', 'academicYearData', 'searchClassData', 'searchClassExamName', 'searchAcademicYearName', 'searchClassses', 'shortCodes', 'className', 'classExamName', 'academic_year_name'));
    }

    public function store_exam_marks($schoolCode)
    {
        //$school_code = '100';
        $searchClassData = null;
        $searchClassExamName = null;
        $searchAcademicYearName = null;

        $className = null;
        $shortCodes = null;
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        return view('Backend/BasicInfo/ExamSetting/classSetExamMarks', compact('classData', 'classExamData', 'academicYearData', 'searchClassData', 'searchClassExamName', 'searchAcademicYearName', 'className', 'shortCodes'));

    }

    public function saveSetExamMarks(Request $request, $school_code)
    {
        // dd($request);
        $subjects = $request->input('subject');
        $school_code = $request->input('school_code');
        $class_name = $request->input('class_name');
        $academic_year_name = $request->input('academic_year_name');
        $exam_name = $request->input('exam_name');
        $action = $request->input('action');
        $key = $request->input('key');
        //dd($subjects);

        foreach ($subjects as $subject) {

            $alreadySaveData = SetClassExamMark::where("school_code", $school_code)->where("action", "approved")->where("exam_name", $exam_name)->where("academic_year_name", $academic_year_name)->where("class_name", $class_name)->where("subject_name", $subject)->exists();
            if ($alreadySaveData) {
                //dd($alreadySaveData);
                return redirect()->route('get.exam.marks', $school_code)->with('error', "Class Exam Marks for this year this class this exam already exist");
            } else {
                //dd($key);
                foreach ($key as $id) {

                    $examMarks = new SetClassExamMark();
                    $examMarks->exam_name = $exam_name;
                    $examMarks->academic_year_name = $academic_year_name;
                    $examMarks->class_name = $class_name;
                    $examMarks->subject_name = $subject;
                    $examMarks->short_code = $request->short_code[$id];
                    $examMarks->total_mark = $request->total_marks[$id];
                    $examMarks->countable_mark = $request->countable_marks[$id];
                    $examMarks->pass_mark = $request->pass_marks[$id];
                    $examMarks->acceptance = $request->acceptance[$id];
                    $examMarks->marge = $request->marge[$id];
                    $examMarks->status = $request->status[$id];
                    $examMarks->action = $action;
                    $examMarks->school_code = $school_code;
                    $examMarks->save();
                }

            }


        }
        return redirect()->route('get.exam.marks', $school_code)->with('success', "Class Exam Marks set successfully");
    }

    public function markConfigView($school_code)
    {
        $shortCodeData = null;
        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();

        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
        return view("Backend/BasicInfo/ExamSetting/markConfig", compact('classData', 'groupData', 'classExamData', 'academicYearData', 'shortCodeData'));
    }
    public function getGroups(Request $request, $school_code)
    {
        $class = $request->class;
        $groups = AddClassWiseGroup::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($groups);
    }
    public function classExam(Request $request, $school_code)
    {
        $class = $request->class;
        $exams = SetShortCode::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($exams);
    }
    public function getMarkConfig(Request $request, $school_code)
    {
        // dd($request);
        $class = $request->class_name;
        $group = $request->group;
        $exam = $request->exam;
        $year = $request->year;

        $shortCodeData = SetClassExamMark::where('class_name', $class)->where('exam_name', $exam)->where('academic_year_name', $year)->get();



        $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
        $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();

        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();

        return view("Backend/BasicInfo/ExamSetting/markConfig", compact("shortCodeData", "classData", "groupData", "classExamData", "academicYearData"));
    }

    public function deleteExamMarks($id)
    {
        $school_code = Session::get("school_code");
        $markData = SetClassExamMark::find($id);

        if ($markData) {
            $markData->delete();
            return redirect()->route('mark.config.view', $school_code)->with("success", "Exam Mark deleted successfully");
        }
        return redirect()->route('mark.config.view', $school_code)->with("error", "Exam Mark can not deleted");
    }

    public function viewUpdateForm($school_code, $id)
    {

        // dd($school_code);

        $data = SetClassExamMark::find($id);
        return view("Backend.BasicInfo.ExamSetting.updateSetMark", compact("data"));

    }

    public function updateExamMarks(Request $request)
    {
        $school_code = Session::get("school_code");
        $id = $request->input("id");
        $short_code = $request->input("short_code");
        $total_mark = $request->input("total_mark");
        $countable_mark = $request->input("countable_mark");
        $pass_mark = $request->input("pass_mark");
        $acceptance = $request->input("acceptance");

        $data = SetClassExamMark::findOrFail($id)->update([
            "short_code" => $short_code,
            "total_mark" => $total_mark,
            "countable_mark" => $countable_mark,
            "pass_mark" => $pass_mark,
            "acceptance" => $acceptance,
        ]);
        if ($data) {
            return redirect()->route('mark.config.view', $school_code)->with("success", "Short code mark updated successfully");
        } else {
            return redirect()->route('mark.config.view', $school_code)->with("error", "Cannot update short code ");
        }
    }
}
