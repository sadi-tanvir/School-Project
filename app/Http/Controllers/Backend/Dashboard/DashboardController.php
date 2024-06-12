<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SchoolInfo;
use App\Models\Student;
use App\Models\AddClass;
use App\Models\AddSection;
use App\Models\AddGroup;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index($schoolCode)
    {
        $totalSMS = 0;
        $school_code = Session::get('school_code');
        $studentData = Student::where('school_code', $schoolCode)->get();
        $classData = AddClass::where('school_code', $schoolCode)->get();
        $sectionData = AddSection::where('school_code', $schoolCode)->get();
        $groupData = AddGroup::where('school_code', $schoolCode)->get();
        $msgData = Message::where('school_code', $schoolCode)->sum('message_count');
        $schoolInfo = SchoolInfo::where('school_code', $school_code)->first();
        $totalSMS = $schoolInfo->messages;
        $remainingSMS = $totalSMS - $msgData;
        if ($totalSMS != 0) {
            $parsentRemainingSMSData = $msgData / $totalSMS;
        } else {
            $parsentRemainingSMSData = 0;
        }
        $parsentRemainingSMS = $parsentRemainingSMSData * 100;
        // dd($schoolInfo);

        $totalStudent = $studentData->count();


        return view("Backend.Dashboard.Dashboard", compact('totalStudent', 'classData', 'sectionData', 'groupData', 'msgData', 'remainingSMS', 'parsentRemainingSMS'));

    }
}
