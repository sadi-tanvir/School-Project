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
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function AddStudentForm($schoolCode)
    {
        // $school_code=100;
        $studentId= $this->generateUniqueStudentId();
        $classes=AddClass::where("action", "approved")->where("school_code",$schoolCode)->get();
        $sections=AddSection::where("action", "approved")->where("school_code",$schoolCode)->get();
        $groups=AddGroup::where("action", "approved")->where("school_code",$schoolCode)->get();
        $shifts=AddShift::where("action", "approved")->where("school_code",$schoolCode)->get();
        $sessions=AddAcademicSession::where("action", "approved")->where("school_code",$schoolCode)->get();
        $years=AddAcademicYear::where("action", "approved")->where("school_code",$schoolCode)->get();
        $categories=AddCategory::where("action", "approved")->where("school_code",$schoolCode)->get();
        return view("Backend.Student.addStudent",compact("studentId","classes","sections","groups", "shifts","sessions","years","categories"));
    }

    public function addStudent(Request $request)
    {

       $request->validate([
                'image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $imagePath=null;
            if($request->hasFile('image')){
                $imagePath = $request->file('image')->move('images/student', $request->input('nedubd_student_id') . '_' . uniqid() . '.' . $request->file('image')->extension());
                $studentImage = 'images/student/' . basename($imagePath);
            }

            

            // dd($studentImage);

            $isExist = Student::where('nedubd_student_id', $request->input('nedubd_student_id'))
                ->exists();

            if ($isExist) {
                return redirect()->back()->with('error', 'This Student already exists.');
            }

            $student = new Student();
            $student->name = $request->input('name');
            $student->birth_date = $request->input('birth_date');
            $student->nedubd_student_id = $request->input('nedubd_student_id');
            $student->student_id = $request->input('student_id')??$this->generateUniqueStudentId();
            $student->student_roll = $request->input('student_roll');
            $student->Class_name = $request->input('Class_name');
            $student->group = $request->input('group');
            $student->section = $request->input('section');
            $student->shift = $request->input('shift');
            $student->category = $request->input('category');
            $student->year = $request->input('year');
            $student->gender = $request->input('gender');
            $student->religious = $request->input('religious');
            $student->nationality = $request->input('nationality');
            $student->blood_group = $request->input('blood_group');
            $student->session = $request->input('session');
            $student->status = $request->input('status');
            $student->image = $studentImage??null;
            $student->admission_date = $request->input('admission_date');
            $student->mobile_no = $request->input('mobile_no');
            $student->father_name = $request->input('father_name');
            $student->father_mobile = $request->input('father_mobile');
            $student->father_occupation = $request->input('father_occupation');
            $student->father_nid = $request->input('father_nid');
            $student->father_birth_date = $request->input('father_birth_date');
            $student->mother_name = $request->input('mother_name');
            $student->mother_number = $request->input('mother_number');
            $student->mother_occupation = $request->input('mother_occupation');
            $student->mother_nid = $request->input('mother_nid');
            $student->mother_birth_date = $request->input('mother_birth_date');
            $student->mother_income = $request->input('mother_income');
            $student->present_village = $request->input('present_village');
            $student->present_post_office = $request->input('present_post_office');
            $student->present_country = $request->input('present_country');
            $student->present_zip_code = $request->input('present_zip_code');
            $student->present_district = $request->input('present_district');
            $student->present_police_station = $request->input('present_police_station');
            $student->parmanent_village = $request->input('parmanent_village');
            $student->parmanent_post_office = $request->input('parmanent_post_office');
            $student->parmanent_country = $request->input('parmanent_country');
            $student->parmanent_zip_code = $request->input('parmanent_zip_code');
            $student->parmanent_district = $request->input('parmanent_district');
            $student->parmanent_police_station = $request->input('parmanent_police_station');
            $student->guardian_name = $request->input('guardian_name');
            $student->guardian_address = $request->input('guardian_address');
            $student->last_school_name = $request->input('last_school_name');
            $student->last_class_name = $request->input('last_class_name');
            $student->last_result = $request->input('last_result');
            $student->last_passing_year = $request->input('last_passing_year');
            $student->email = $request->input('email');
            $student->password = Hash::make($request->input('password') ?? '12345');
            $student->role = 'student';
            $student->school_code = $request->input('school_code');
            $student->action = $request->input('action');
            $student->save();
            return redirect()->back()->with('success', 'student added successfully!');
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


    public function updateStudentBasicInfo(){
        return view('Backend.Student.updateStudentBasicInfo');
    }
  
    
   
}
