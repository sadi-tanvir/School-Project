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

class UpdateStudentController extends Controller
{
   public function student_update($id,$schoolCode){

    $student = Student::findOrFail($id);
    $classes=AddClass::where("action", "approved")->where("school_code",$schoolCode)->get();
    $sections=AddSection::where("action", "approved")->where("school_code",$schoolCode)->get();
    $groups=AddGroup::where("action", "approved")->where("school_code",$schoolCode)->get();
    $shifts=AddShift::where("action", "approved")->where("school_code",$schoolCode)->get();
    $sessions=AddAcademicSession::where("action", "approved")->where("school_code",$schoolCode)->get();
    $years=AddAcademicYear::where("action", "approved")->where("school_code",$schoolCode)->get();
    $categories=AddCategory::where("action", "approved")->where("school_code",$schoolCode)->get();

       return view ('Backend.Student.updateStudent',compact('student','classes','sections','groups','shifts','sessions','years','categories'));
   }

   public function updateStudent(Request $request, $id)
{
   //dd($id);
   $schoolCode=$request->input('school_code');

  $students = Student::findOrFail($id);
        $students->name = $request->input('name');
            $students->birth_date = $request->input('birth_date');
            $students->nedubd_student_id = $request->input('nedubd_student_id');
            $students->student_id = $request->input('student_id');
            $students->student_roll = $request->input('student_roll');
            $students->Class_name = $request->input('Class_name');
            $students->group = $request->input('group');
            $students->section = $request->input('section');
            $students->shift = $request->input('shift');
            $students->category = $request->input('category');
            $students->year = $request->input('year');
            $students->gender = $request->input('gender');
            $students->religious = $request->input('religious');
            $students->nationality = $request->input('nationality');
            $students->blood_group = $request->input('blood_group');
            $students->session = $request->input('session');
            $students->status = $request->input('status');
            $students->admission_date = $request->input('admission_date');
            $students->mobile_no = $request->input('mobile_no');
            $students->father_name = $request->input('father_name');
            $students->father_mobile = $request->input('father_mobile');
            $students->father_occupation = $request->input('father_occupation');
            $students->father_nid = $request->input('father_nid');
            $students->father_birth_date = $request->input('father_birth_date');
            $students->mother_name = $request->input('mother_name');
            $students->mother_number = $request->input('mother_number');
            $students->mother_occupation = $request->input('mother_occupation');
            $students->mother_nid = $request->input('mother_nid');
            $students->mother_birth_date = $request->input('mother_birth_date');
            $students->mother_income = $request->input('mother_income');
            $students->present_village = $request->input('present_village');
            $students->present_post_office = $request->input('present_post_office');
            $students->present_country = $request->input('present_country');
            $students->present_zip_code = $request->input('present_zip_code');
            $students->present_district = $request->input('present_district');
            $students->present_police_station = $request->input('present_police_station');
            $students->parmanent_village = $request->input('parmanent_village');
            $students->parmanent_post_office = $request->input('parmanent_post_office');
            $students->parmanent_country = $request->input('parmanent_country');
            $students->parmanent_zip_code = $request->input('parmanent_zip_code');
            $students->parmanent_district = $request->input('parmanent_district');
            $students->parmanent_police_station = $request->input('parmanent_police_station');
            $students->guardian_name = $request->input('guardian_name');
            $students->guardian_address = $request->input('guardian_address');
            $students->last_school_name = $request->input('last_school_name');
            $students->last_class_name = $request->input('last_class_name');
            $students->last_result = $request->input('last_result');
            $students->last_passing_year = $request->input('last_passing_year');
            $students->role = 'student';
            $students->school_code = $request->input('school_code');
            $students->action = $request->input('action');
            $students->save();

            $student=null;
            $classes=AddClass::where("action", "approved")->where("school_code",$schoolCode)->get();
            $sections=AddSection::where("action", "approved")->where("school_code",$schoolCode)->get();
            $groups=AddGroup::where("action", "approved")->where("school_code",$schoolCode)->get();
            $sessions=AddAcademicSession::where("action", "approved")->where("school_code",$schoolCode)->get();
            $years=AddAcademicYear::where("action", "approved")->where("school_code",$schoolCode)->get();
            return view('Backend.Student.studentProfileUpdate',compact('classes','sections','groups','sessions','years','student'))->with('success', 'Student updated successfully');
}
}


