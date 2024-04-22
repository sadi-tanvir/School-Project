<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SchoolAdmin;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        // $school_code=Session::get('school_code');
      
        //  if($school_code){
        //     return redirect('/dashboard',$school_code);
        //  }
        //  else{
             return view("Auth.Login");   
    }

    public function loginUser(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'password' => 'required|string|min:4',
        ]);

        

        $admin = Admin::where('email', $request->name)->orWhere('phone_number', $request->name)->first();
        $schoolAdmin = SchoolAdmin::where('email', $request->name)->orWhere('mobile_number', $request->name)->first();
        $student = Student::where('student_id', $request->name)->orWhere('email', $request->name)->orWhere('father_mobile', $request->name)->first();
        $teacher = Teacher::where('teacher_id', $request->name)->orWhere('mobile', $request->name)->first();

       
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                Session::put('AdminId', $admin->id);
                Session::put('school_code', $admin->school_code);
                return redirect('/dashboard/' . $admin->school_code)->with('success', 'Login successful!');

            } else {
                return back()->with('error', 'Login failed. Please check your Id or password.');
            }
        }
        
        else if($student){
            if (Hash::check($request->password, $student->password)) {
                Session::put('studentId', $student->id);
                Session::put('school_code', $student->school_code);

                return redirect('/dashboard/' . $student->school_code)->with('success', 'Login successful!');
            } else {
                return back()->with('error', 'Login failed. Please check your Id or password.');
            }
        }
        else if($teacher){
            if (Hash::check($request->password, $teacher->password)) {
                Session::put('teacherID', $teacher->id);
                Session::put('school_code', $teacher->school_code);

                return redirect('/dashboard/' . $teacher->school_code)->with('success', 'Login successful!');
            } else {
                return back()->with('error', 'Login failed. Please check your Id or password.');
            }
        }
        else if($schoolAdmin){
            if (Hash::check($request->password, $schoolAdmin->password)) {
                Session::put('schoolAdminId', $schoolAdmin->id);
                Session::put('school_code', $schoolAdmin->school_code);

                return redirect('/dashboard/' . $schoolAdmin->school_code)->with('success', 'Login successful!');
            } else {
                return back()->with('error', 'Login failed. Please check your Id or password.');
            }
        }
    }

    public function logout()
    {
        if (Session::has('schoolAdminId')) {
            Session::pull('schoolAdminId');
            return redirect('/login');
        }
        if (Session::has('teacherID')) {
            Session::pull('teacherID');
            return redirect('/login');
        }
        if (Session::has('studentId')) {
            Session::pull('studentId');
            return redirect('/login');
        }
        if (Session::has('AdminId')) {
            Session::pull('AdminId');
            return redirect('/login');
        }
        
    }

}
