<?php

namespace App\Http\Controllers\Backend\Student\StudentReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class listOfMigrateStudentListController extends Controller
{
    //
    public function listOfMigrateStudent($school_code)
    {
        return view('Backend.Student.students(report).listOfMigrateStudentList');
    }
}
