<?php

namespace App\Http\Controllers\Backend\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
   public function addTeacher()
   {
      $teacherId= $this->generateTeacherId();
      return view("Backend.Teacher.addTeacher", compact("teacherId"));
   }

   public function createTeacher(Request $request)
   {

      $this->validate($request, [
         'teacher_id'=>'required|string',
         'name' => 'required|string',
         'mobile' => 'required|string',
         'emg_mobile' => 'required|string',
         'email' => 'required|string',
         'password' => 'required|string',
         'fbid' => 'required|string',
         'department' => 'required|string',
         'designation' => 'required|string',
         'gender' => 'required|string',
         'subject' => 'required|string',
         'index' => 'required|string',
         'salary_account' => 'required|string',
         'pf' => 'required|string',
         'father_name' => 'required|string',
         'father_mobile' => 'required|string',
         'mother_name' => 'required|string',
         'mother_number' => 'required|string',
         'birth_date' => 'required|string',
         'nationality' => 'required|string',
         'blood' => 'required|string',
         'nid' => 'required|string',
         'marital_status' => 'required|string',
         'age' => 'required|string',
         'religious' => 'required|string',
         'joining_date' => 'required|string',
         'present_village' => 'required|string',
         'present_post_office' => 'required|string',
         'present_zip_code' => 'required|string',
         'present_district' => 'required|string',
         'present_police_station' => 'required|string',
         'parmanent_village' => 'required|string',
         'parmanent_post_office' => 'required|string',
         'parmanent_zip_code' => 'required|string',
         'parmanent_district' => 'required|string',
         'parmanent_police_station' => 'required|string',
         'ssc' => 'required|string',
         'school_name' => 'required|string',
         'ssc_department' => 'required|string',
         'ssc_roll' => 'required|string',
         'ssc_reg' => 'required|string',
         'ssc_gpa' => 'required|string',
         'ssc_year' => 'required|string',
         'hsc' => 'required|string',
         'college_name' => 'required|string',
         'college_department' => 'required|string',
         'college_roll' => 'required|string',
         'college_reg' => 'required|string',
         'college_gpa' => 'required|string',
         'college_passing_year' => 'required|string',
         'honors' => 'required|string',
         'versity_name' => 'required|string',
         'versity_department' => 'required|string',
         'versity_roll' => 'required|string',
         'versity_reg' => 'required|string',
         'versity_gpa' => 'required|string',
         'versity_passing_year' => 'required|string',
      ]);


      if ($request->hasFile('image')) {
         $request->validate([
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->move('images/teacher', $request->input('teacher_id') . '_' . uniqid() . '.' . $request->file('image')->extension());

       
            $teacherImage = 'images/teacher/' . basename($imagePath);

            $isExist = Teacher::where('teacher_id', $request->input('teacher_id'))
                ->exists();

            if ($isExist) {
                return back()->with('error', 'Failed. This teacher already exists');
            }

            $teacher=new Teacher();
            $teacher->teacher_id = $request->input('teacher_id');
            $teacher->name = $request->input('name');
            $teacher->mobile = $request->input('mobile');
            $teacher->image = $teacherImage;
            $teacher->emg_mobile = $request->input('emg_mobile');
            $teacher->email = $request->input('email');
            $teacher->password = $request->input('password');
            $teacher->fbid = $request->input('fbid');
            $teacher->department = $request->input('department');
            $teacher->designation = $request->input('designation');
            $teacher->gender = $request->input('gender');
            $teacher->subject = $request->input('subject');
            $teacher->index = $request->input('index');
            $teacher->salary_account = $request->input('salary_account');
            $teacher->pf = $request->input('pf');
            $teacher->father_name = $request->input('father_name');
            $teacher->father_mobile = $request->input('father_mobile');
            $teacher->mother_name = $request->input('mother_name');
            $teacher->mother_number = $request->input('mother_number');
            $teacher->birth_date = $request->input('birth_date');
            $teacher->nationality = $request->input('nationality'); 
            $teacher->blood = $request->input('blood'); 
            $teacher->nid = $request->input('nid'); 
            $teacher->marital_status = $request->input('marital_status'); 
            $teacher->age = $request->input('age'); 
            $teacher->religious = $request->input('religious'); 
            $teacher->joining_date = $request->input('joining_date'); 
            $teacher->present_village = $request->input('present_village'); 
            $teacher->present_post_office = $request->input('present_post_office'); 
            $teacher->present_zip_code = $request->input('present_zip_code'); 
            $teacher->present_district = $request->input('present_district'); 
            $teacher->present_police_station = $request->input('present_police_station'); 
            $teacher->parmanent_village = $request->input('parmanent_village'); 
            $teacher->parmanent_post_office = $request->input('parmanent_post_office'); 
            $teacher->parmanent_zip_code = $request->input('parmanent_zip_code'); 
            $teacher->parmanent_district = $request->input('parmanent_district'); 
            $teacher->parmanent_police_station = $request->input('parmanent_police_station'); 
            $teacher->ssc = $request->input('ssc'); 
            $teacher->school_name = $request->input('school_name'); 
            $teacher->ssc_department = $request->input('ssc_department'); 
            $teacher->ssc_roll = $request->input('ssc_roll'); 
            $teacher->ssc_reg = $request->input('ssc_reg'); 
            $teacher->ssc_gpa = $request->input('ssc_gpa'); 
            $teacher->ssc_year = $request->input('ssc_year'); 
            $teacher->hsc = $request->input('hsc'); 
            $teacher->college_name = $request->input('college_name'); 
            $teacher->college_department = $request->input('college_department'); 
            $teacher->college_roll = $request->input('college_roll'); 
            $teacher->college_reg = $request->input('college_reg'); 
            $teacher->college_gpa = $request->input('college_gpa'); 
            $teacher->college_passing_year = $request->input('college_passing_year'); 
            $teacher->honors = $request->input('honors'); 
            $teacher->versity_name = $request->input('versity_name'); 
            $teacher->versity_department = $request->input('versity_department'); 
            $teacher->versity_roll = $request->input('versity_roll'); 
            $teacher->versity_reg = $request->input('versity_reg'); 
            $teacher->versity_gpa = $request->input('versity_gpa'); 
            $teacher->versity_passing_year = $request->input('versity_passing_year'); 
            $teacher->qua_name = $request->input('qua_name'); 
            $teacher->qua_industry_name = $request->input('qua_industry_name'); 
            $teacher->qua_description = $request->input('qua_description'); 
            $teacher->qua_2_name = $request->input('qua_2_name'); 
            $teacher->qua_2_industry_name = $request->input('qua_2_industry_name'); 
            $teacher->qua_2_description = $request->input('qua_2_description'); 
            $teacher->post_name = $request->input('post_name'); 
            $teacher->industrial_name = $request->input('industrial_name'); 
            $teacher->start_date = $request->input('start_date'); 
            $teacher->end_date = $request->input('end_date'); 
            $teacher->school_code = $request->input('school_code'); 
            $teacher->role = $request->input('role'); 
            $teacher->action = $request->input('action');
         
            $teacher->save();
            
            return redirect('/dashboard/add-teacher')->with('success', 'Teacher Sucessfully  created.');
      }


   }

   private function generateTeacherId()
    {
        $lastTeacher = Teacher::latest()->first();
        if ($lastTeacher) {
            $lastId = intval(substr($lastTeacher->teacher_id, -4));
            $newId = $lastId + 1;
        } else {
            $newId = 1;
        }

        return 'TEACHER' . date('Y') . str_pad($newId, 4, '0', STR_PAD_LEFT);
    }
}

