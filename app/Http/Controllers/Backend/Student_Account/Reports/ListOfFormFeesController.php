<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListOfFormFeesController extends Controller
{

    public function listOfFormFees(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/listOfFormFees');
     }
}
