<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\MyAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllStatementController extends Controller
{
    public function AllStatementView(){
        return view("Backend.GeneralAccounts.MyAccount.AllStatement");
    }
}
