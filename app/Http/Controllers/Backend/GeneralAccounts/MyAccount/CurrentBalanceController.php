<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\MyAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrentBalanceController extends Controller
{
    public function CurrentBalanceView(){
        return view("Backend.GeneralAccounts.MyAccount.CurrentBalance");
    }
}
