<?php

namespace App\Http\Controllers\Backend\Student_Account\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FineFailController extends Controller
{
    
    public function AddFineFail(){
        return view ('Backend/Student_accounts/others/fineFailAbsentFee');
     }
}
