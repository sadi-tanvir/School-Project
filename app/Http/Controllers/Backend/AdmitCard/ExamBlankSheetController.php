<?php

namespace App\Http\Controllers\Backend\AdmitCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamBlankSheetController extends Controller
{
    public function ExamBlankSheet(){
        return view('Backend/AdmitCard/Report(admitcards)/ExamBlankSheet');
    }
    
}
