<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomeStatementController extends Controller
{
    public function IncomeStatementView(){
        return view("Backend.GeneralAccounts.Reports_GeneralAccounts.IncomeStatement");
    }
}
