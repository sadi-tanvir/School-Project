<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListOfMonthWiseFeesController extends Controller
{
    
    public function listOfMonthWiseFees(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/listOfMonthWiseFees');
     }
}
