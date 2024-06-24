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
        $school_code=$request->input('school_code');


        $searchClassses=AddClassWiseSubject::where("school_code",$school_code)->where("action","approved")->where('class_name',$className)->get();

        // dd($searchClassses);


    $shortCodes=SetShortCode::where('school_code',$school_code)->where('action','approved')->where('class_name',$className)->where('class_exam_name',$classExamName)->where('academic_year_name',$academic_year_name)->get();

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
        return view('Backend/BasicInfo/ExamSetting/classSetExamMarks', compact('classData', 'classExamData', 'academicYearData', 'searchClassData', 'searchClassExamName', 'searchAcademicYearName','searchClassses', 'shortCodes','className','classExamName','academic_year_name'));
    }

    public function store_exam_marks($schoolCode)
    {
        //$school_code = '100';
        $searchClassData = null;
        $searchClassExamName = null;
        $searchAcademicYearName = null;
       
        $className=null;
        $shortCodes =null;
        $classData = AddClass::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $schoolCode)->get();
        $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $schoolCode)->get();
        return view('Backend/BasicInfo/ExamSetting/classSetExamMarks', compact('classData', 'classExamData', 'academicYearData', 'searchClassData', 'searchClassExamName', 'searchAcademicYearName','className','shortCodes'));

    }

    public function saveSetExamMarks(Request $request,$school_code){
       // dd($request);
            $subjects=$request->input('subject');
            if($subjects==null){
                return redirect()->route('get.exam.marks',$school_code)->with('error', "Pease select the subject");
            }
            $school_code=$request->input('school_code');
            $class_name=$request->input('class_name');
            $academic_year_name=$request->input('academic_year_name');
            $exam_name=$request->input('exam_name');
            $action = $request->input('action');
            $key=$request->input('key');
             
            // dd($subjects);

            foreach($subjects as $subject) {
         
                    
                        foreach ($key as $id) {
                            $alreadySaveData = SetClassExamMark::where("school_code", $school_code)
                            ->where("action", "approved")
                            ->where("exam_name", $exam_name)
                            ->where("academic_year_name", $academic_year_name)
                            ->where("class_name", $class_name)
                            ->where("subject_name", $subject)
                            ->where('short_code',$request->short_code[$id])
                            ->exists();
                            if ($alreadySaveData) {
                            // dd($request->total_marks[$id]);
                                                SetClassExamMark::where("school_code", $school_code)
                                                ->where("action", "approved")
                                                ->where("exam_name", $exam_name)
                                                ->where("academic_year_name", $academic_year_name)
                                                ->where("class_name", $class_name)
                                                ->where("subject_name", $subject)
                                                ->where('short_code',$request->short_code[$id])
                                                ->update([
                                                    "total_mark" => $request->total_marks[$id],
                                                    "countable_mark" => $request->countable_marks[$id],
                                                    "pass_mark" => $request->pass_marks[$id],
                                                    "acceptance" => $request->acceptance[$id],
                                                    "marge" => $request->marge[$id],
                                                    "status" => $request->status[$id],
                                                ]);
                             }
                             else {
                                
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
            
            return redirect()->route('get.exam.marks',$school_code)->with('success', "Class Exam Marks set successfully");
        }

        public function viewSetExamMarks($school_code)
        {
            $setClassExamData=[];
            $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
            $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
            $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
            $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
            $classExamData=AddClassExam::where('action', 'approved')->where('school_code',$school_code)->get();
            return view("Backend.BasicInfo.ExamSetting.viewExamMarkSetUp",compact("classData","groupData","academicYearData","classExamData"));
        }
        public function getGroups(Request $request, $school_code)
        {
            $class = $request->class;
    
            $groups = AddClassWiseGroup::where('class_name', $class)->where('school_code', $school_code)->get();
            return response()->json($groups);
        }

        public function getSetExamMarksData(Request $request,$school_code)
        {
            $class= $request->class;
            $group= $request->group;
            $exam = $request->exam;
            $year= $request->year;

            $setClassExamData=SetClassExamMark::where('school_code',$school_code)->where('action','approved')->where('class_name', $class)->where('academic_year_name',$year)->where('exam_name',$exam)->get();
           

            $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
            $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
            $sectionData = AddSection::where('action', 'approved')->where('school_code', $school_code)->get();
            $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
            $classExamData=AddClassExam::where('action', 'approved')->where('school_code',$school_code)->get();

            return view("Backend.BasicInfo.ExamSetting.viewExamMarkSetUp",compact("classData","groupData","academicYearData","classExamData","setClassExamData"));

        }

        public function deleteExamMarks($id, $school_code)
        {
            $deletedData = SetClassExamMark::findOrFail($id)->delete();
            
            $classData = AddClass::where('action', 'approved')->where('school_code', $school_code)->get();
            $groupData = AddGroup::where('action', 'approved')->where('school_code', $school_code)->get();
            $academicYearData = AddAcademicYear::where('action', 'approved')->where('school_code', $school_code)->get();
            $classExamData = AddClassExam::where('action', 'approved')->where('school_code', $school_code)->get();
            $setClassExamData = SetClassExamMark::where('school_code', $school_code)->where('action', 'approved')->get();
    
            return view("Backend.BasicInfo.ExamSetting.viewExamMarkSetUp", compact("classData", "groupData", "academicYearData", "classExamData", "setClassExamData"))
                ->with('success', $deletedData ? 'Exam Deleted Successfully' : 'Failed to delete exam');
        }
}
