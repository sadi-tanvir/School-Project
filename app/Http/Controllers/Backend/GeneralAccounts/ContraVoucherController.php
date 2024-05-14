<?php

namespace App\Http\Controllers\Backend\GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContraVoucherController extends Controller
{
    public function ContraVoucherView(){
        return view("Backend.GeneralAccounts.ContraVoucher");
    }
}
