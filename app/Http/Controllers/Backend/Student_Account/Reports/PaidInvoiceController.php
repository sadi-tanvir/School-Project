<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaidInvoiceController extends Controller
{
  
    public function paidInvoice(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/paidInvoice');
     }

}
