<?php

namespace App\Http\Controllers\Backend\MachineAttendance;

use App\Http\Controllers\Controller;
use App\Models\AddClass;
use App\Models\AddPeriod;
use App\Models\StudentAttendenceTimeSetup;
use Illuminate\Http\Request;

class StudentTimeSettingController extends Controller
{
    public function viewTimeSetting($school_code)
    {
        $SelectedPeriod = null;
        $period = null;
        $start_time = null;
        $end_time = null;
        $delay_time = null;
        $periods = AddPeriod::where('school_code', $school_code)->where('action', 'approved')->get();
        $classes = AddClass::where('school_code', $school_code)->where('action', 'approved')->get();
        return view('Backend.MachineAttendence.stdTimeSettings', compact('periods', 'classes', 'SelectedPeriod', 'start_time', 'end_time', 'delay_time'));
    }
    public function getTimeSetupData(Request $request, $school_code)
    {

        if (!$request->period) {
            return redirect()->back()->with('error', 'Please select a period name');
        } {
            $SelectedPeriod = $request->period;
            $start_time = $request->start_time;
            $end_time = $request->end_time;
            $delay_time = $request->delay_time;
            $periods = AddPeriod::where('school_code', $school_code)->where('action', 'approved')->get();
            $classes = AddClass::where('school_code', $school_code)->where('action', 'approved')->get();
            return view('Backend.MachineAttendence.stdTimeSettings', compact('periods', 'SelectedPeriod', 'start_time', 'end_time', 'delay_time', 'classes'));
        }
    }

    public function postStudentTimeSetup(Request $request, $school_code)
    {
        // Loop through the classes and save the attendance setup
        foreach ($request->classNames as $index => $className) {
            StudentAttendenceTimeSetup::updateOrCreate(
                ['class_name' => $className],
                [
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'delay_time' => $request->delay_time,
                    'school_code' => $school_code,
                    'period' => $request->period,
                    'status' => isset($request->status[$index]),
                ]
            );
        }
        return redirect()->route('std.time.setting', $school_code)->with('success', 'Attendance Time Setup saved successfully.');
    }

    public function viewStudentTimeSetupConfig($school_code)
    {
        $StudentTimeConfigs=null;
        $periods = AddPeriod::where('school_code', $school_code)->where('action', 'approved')->get();
        return view('Backend.MachineAttendence.viewStudentTimeConfig',compact('periods','StudentTimeConfigs'));
    }

    public function viewConfigTable(Request $request,$school_code)
    {
        // dd($request);
        $StudentTimeConfigs=StudentAttendenceTimeSetup::where('school_code',$school_code)->where('period',$request->period)->get();
        $periods = AddPeriod::where('school_code', $school_code)->where('action', 'approved')->get();
        return view('Backend.MachineAttendence.viewStudentTimeConfig',compact('periods','StudentTimeConfigs'));
    }

    
}

