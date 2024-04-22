<?php

namespace App\Http\Controllers\Backend\Student_Account\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function AddDonationFee(){
        return view ('Backend/Student_accounts/others/donation');
     }
}
