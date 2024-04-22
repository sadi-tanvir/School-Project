<?php

namespace App\Http\Controllers\Backend\Student_Account\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListOfFineOrFailOrAbsentController extends Controller
{
    
    public function listOfFineOrFailOrAbsent(){
        return view ('Backend/Student_accounts/Reports(Students_Fees)/listOfFineOrFailOrAbsent');
     }
}
