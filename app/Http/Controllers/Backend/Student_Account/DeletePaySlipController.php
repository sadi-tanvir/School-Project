<?php

namespace App\Http\Controllers\Backend\Student_Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeletePaySlipController extends Controller
{
    public function DeletePaySlipView(Request $request){
        return view("Backend.Student_accounts.DeletePaySlip");
    }
}
