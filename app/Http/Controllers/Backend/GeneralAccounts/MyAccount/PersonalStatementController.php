<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\MyAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalStatementController extends Controller
{
    public function PersonalStatementView(){
        return view("Backend.GeneralAccounts.MyAccount.PersonalStatement");
    }
}
