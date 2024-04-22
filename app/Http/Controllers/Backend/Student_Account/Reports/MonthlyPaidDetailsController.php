<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonthlyPaidDetailsController extends Controller
{
    
    public function monthlyPaidDetails(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/monthlyPaidDetails');
     }
}
