<?php

namespace App\Http\Controllers\Backend\GeneralAccounts\Reports_GeneralAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JournalBookController extends Controller
{
    public function JournalBookView(){
        return view("Backend.GeneralAccounts.Reports_GeneralAccounts.JournalBook");
    }
}
