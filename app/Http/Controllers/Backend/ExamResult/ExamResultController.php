<?php

namespace App\Http\Controllers\Backend\ExamResult;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicYear;
use App\Models\AddClass;
use App\Models\AddClassExam;
use App\Models\AddGroup;
use App\Models\AddSection;
use App\Models\AddShift;
use App\Models\AddSubject;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
   

    




    public function exam_process()
    {
        return view('/Backend/ExamResult/exam_process');
    }
    public function exam_excel()
    {
        return view('/Backend/ExamResult/exam_excel');
    }
    public function exam_marks_delete()
    {
        return view('/Backend/ExamResult/exam_marks_delete');
    }
    public function exam_sms()
    {
        return view('/Backend/ExamResult/exam_sms');
    }
}
