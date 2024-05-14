<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashBookController extends Controller
{
    public function CashBookView(){
        return view("Backend.GeneralAccounts.Reports_GeneralAccounts.CashBook");
    }
}
