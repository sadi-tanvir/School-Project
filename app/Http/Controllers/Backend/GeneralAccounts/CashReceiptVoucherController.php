<?php

namespace App\Http\Controllers\Backend\GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashReceiptVoucherController extends Controller
{
    public function CashReceiptVoucherView(){
        return view("Backend.GeneralAccounts.CashReceiptVoucher");
    }
}
