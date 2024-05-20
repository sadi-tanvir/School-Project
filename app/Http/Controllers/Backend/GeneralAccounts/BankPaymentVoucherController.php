<?php

namespace App\Http\Controllers\Backend\GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankPaymentVoucherController extends Controller
{
    public function BankPaymentVoucherView(){
        return view("Backend.GeneralAccounts.BankPaymentVoucher");
    }
}
