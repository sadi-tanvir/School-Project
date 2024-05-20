<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomeExpenseSummaryController extends Controller
{
    public function IncomeExpenseSummaryView(){
        return view("Backend.GeneralAccounts.Reports_GeneralAccounts.IncomeExpenseSummary");
    }
}
