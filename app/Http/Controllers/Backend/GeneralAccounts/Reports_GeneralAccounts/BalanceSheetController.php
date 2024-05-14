<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalanceSheetController extends Controller
{
    public function BalanceSheetView(){
        return view("Backend.GeneralAccounts.Reports_GeneralAccounts.BalanceSheet");
    }
}
