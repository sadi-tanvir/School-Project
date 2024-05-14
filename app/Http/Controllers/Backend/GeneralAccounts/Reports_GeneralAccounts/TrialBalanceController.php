<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrialBalanceController extends Controller
{
    public function TrialBalanceView(){
        return view("Backend.GeneralAccounts.Reports_GeneralAccounts.TrialBalance");
    }
}
