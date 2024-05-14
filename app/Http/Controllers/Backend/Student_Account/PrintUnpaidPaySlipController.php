<?php

namespace App\Http\Controllers\Backend\Student_Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintUnpaidPaySlipController extends Controller
{
    public function PrintUnpaidPaySlipForm(Request $request){
        return view("Backend.Student_accounts.PrintUnpaidPaySlip");
    }
}
