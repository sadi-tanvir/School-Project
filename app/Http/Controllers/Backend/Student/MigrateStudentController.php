<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MigrateStudentController extends Controller
{
    public function migrateStudent(){
        return view('Backend.Student.migrateStudent');
    }
}
