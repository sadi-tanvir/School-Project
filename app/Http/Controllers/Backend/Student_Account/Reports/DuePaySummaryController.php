<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DuePaySummaryController extends Controller
{
    
    public function DuepaySummary(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/duePaySummary');
     }
}
