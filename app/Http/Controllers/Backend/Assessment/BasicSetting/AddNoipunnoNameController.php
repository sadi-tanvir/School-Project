<?php

namespace App\Http\Controllers\Backend\Assessment\BasicSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddNoipunnoNameController extends Controller
{
    public function AddNoipunnoNameView()
    {
        return view("Backend.Assessment.BasicSetting.AddNoipunnoName");
    }
}
