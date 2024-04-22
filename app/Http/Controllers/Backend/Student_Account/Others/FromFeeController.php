<?php

namespace App\Http\Controllers\Backend\Student_Account\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FromFeeController extends Controller
{
    public function AddFromFee(){
        return view ('Backend/Student_accounts/others/fromFee');
     }
}
