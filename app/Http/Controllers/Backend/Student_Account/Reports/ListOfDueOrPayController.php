<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListOfDueOrPayController extends Controller
{
    
    public function ListOfdueOrPay(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/ListOfdueOrPay');
     }
}
