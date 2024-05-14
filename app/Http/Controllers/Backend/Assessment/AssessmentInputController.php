<?php

namespace App\Http\Controllers\Backend\Assessment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssessmentInputController extends Controller
{
    public function AssessmentInputView()
    {
        return view("Backend.Assessment.AssessmentInput");
    }
}
