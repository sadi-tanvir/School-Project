<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClass;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\AddShift;
use App\Models\Student;
use Illuminate\Http\Request;

class BasicAddStudentController extends Controller
{
   public function getStudent($schoolCode){

   $studentId= $this->generateUniqueStudentId();
    $classes=AddClass::where("action", "approved")->where("school_code",$schoolCode)->get();
    $sections=AddSection::where("action", "approved")->where("school_code",$schoolCode)->get();
    $groups=AddGroup::where("action", "approved")->where("school_code",$schoolCode)->get();
    $shifts=AddShift::where("action", "approved")->where("school_code",$schoolCode)->get();
    $sessions=AddAcademicSession::where("action", "approved")->where("school_code",$schoolCode)->get();
    $years=AddAcademicYear::where("action", "approved")->where("school_code",$schoolCode)->get();
    $categories=AddCategory::where("action", "approved")->where("school_code",$schoolCode)->get();
    $shift=AddShift::where("action", "approved")->where("school_code",$schoolCode)->get();

    return view ('Backend.Student.basicAddStudent',compact('studentId','classes','sections','groups','shifts','sessions','years','categories','shift'));
   }


   public function postStudent(Request $request)
{
    $raw = (int)$request->input('row_amount');
    for ($i = 0; $i < $raw; $i++) {
        $student = new Student();
        $student->year = $request->input('year');
        $student->nedubd_student_id = $this->generateUniqueStudentId();
        $student->class_name = $request->input('class_name');
        $student->group = $request->input('group');
        $student->section = $request->input('section');
        $student->category = $request->input('category');
        $student->shift = $request->input('shift');
        $student->school_code = $request->input('school_code');
        $student->action = $request->input('action');
        $student->student_id = $request->input('student_id')[$i] ?? $this->generateUniqueStudentId();
        $student->name = $request->input('name')[$i];
        $student->student_roll = $request->input('roll')[$i];
        $student->father_name = $request->input('father_name')[$i];
        $student->mother_name = $request->input('mother_name')[$i];
        $student->mobile_no = $request->input('mobile')[$i];
        $student->birth_date = $request->input('birthdate')[$i];
        $student->gender = $request->input('gender')[$i];
        $student->religious = $request->input('religion')[$i];
        $student->blood_group = $request->input('bg')[$i];
        $student->save();
    }
    return redirect()->back()->with('success', 'Students added successfully!');
}
   private function generateUniqueStudentId()
   {
       $lastStudent = Student::latest()->first();
       $currentYear = date('Y');
       $newId = 1;
   
       if ($lastStudent) {
           $lastId = intval(substr($lastStudent->nedubd_student_id, -4));
           $newId = $lastId + 1;
       }
   
       $newStudentId = 'STU' . $currentYear . str_pad($newId, 4, '0', STR_PAD_LEFT);
   
       $existingStudent = Student::where('nedubd_student_id', $newStudentId)->first();
       if ($existingStudent) {
           do {
               $newId++;
               $newStudentId = 'STU' . $currentYear . str_pad($newId, 4, '0', STR_PAD_LEFT);
               $existingStudent = Student::where('nedubd_student_id', $newStudentId)->first();
           } while ($existingStudent);
       }
   
       return $newStudentId;
   }

}
