<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OuthTransInquiryController extends Controller
{
   
    public function othTransInquiry(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/othTransInquiry');
     }
}
