<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeadWiseSummaryController extends Controller
{
    

    public function headwiseSummary(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/headwiseSummary');
     }
}
