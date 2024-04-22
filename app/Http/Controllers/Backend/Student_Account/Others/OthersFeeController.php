<?php

namespace App\Http\Controllers\Backend\Student_Account\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OthersFeeController extends Controller
{
    public function AddOthersFee(){
        return view ('Backend/Student_accounts/others/othersFee');
     }
}
