<?php

namespace App\Http\Controllers\Backend\GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoucherPostingController extends Controller
{
    public function VoucherPostingView(){
        return view("Backend.GeneralAccounts.VoucherPosting");
    }
}
