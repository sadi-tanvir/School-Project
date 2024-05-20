<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankBookController extends Controller
{
    public function BankBookView(){
        return view("Backend.GeneralAccounts.Reports_GeneralAccounts.BankBook");
    }
}
