<?php

namespace App\Http\Controllers\Backend\GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankReceiptVoucherController extends Controller
{
    public function BankReceiptVoucherView(){
        return view("Backend.GeneralAccounts.BankReceiptVoucher");
    }
}
