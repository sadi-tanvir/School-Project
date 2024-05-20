<?php

namespace App\Http\Controllers\Backend\GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JournalVoucherController extends Controller
{
    public function JournalVoucherView(){
        return view("Backend.GeneralAccounts.JournalVoucher");
    }
}
