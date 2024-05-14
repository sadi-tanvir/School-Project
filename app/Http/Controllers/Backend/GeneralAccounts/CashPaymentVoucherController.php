<?php

namespace App\Http\Controllers\Backend\GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashPaymentVoucherController extends Controller
{
    public function CashPaymentVoucherView()
    {
        return view("Backend.GeneralAccounts.CashPaymentVoucher");
    }
}
