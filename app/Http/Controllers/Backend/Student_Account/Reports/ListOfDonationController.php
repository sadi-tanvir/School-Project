<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListOfDonationController extends Controller
{
    public function listOfDonation(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/listOfDonation');
     }
}
