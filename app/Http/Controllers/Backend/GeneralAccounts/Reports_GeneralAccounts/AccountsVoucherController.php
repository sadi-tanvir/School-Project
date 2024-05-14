<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountsVoucherController extends Controller
{
    public function AccountsVoucherView(){
        return view("Backend.GeneralAccounts.Reports_GeneralAccounts.AccountsVoucher");
    }
}
