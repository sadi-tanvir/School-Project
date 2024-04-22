<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class geneTranferInquiriController extends Controller
{
    
    public function geneTransferInquiri(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/geneTransferInquiri');
     }
}
