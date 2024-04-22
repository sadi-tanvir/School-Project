<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use Illuminate\Http\Request;

class AddAcademicSessionController extends Controller
{
    public function add_academic_session($schoolCode)
    {
       // $school_code = '100';
        $academicSessionData = AddAcademicSession::where('action', 'approved')->where('school_code', $schoolCode)->get();
        // dd($academicSessionData);
        return view('Backend/BasicInfo/CommonSetting/addAcademicSession', compact('academicSessionData'));
    }


    public function store_add_academic_session(Request $request,$schoolCode)
    {

        // dd($request);
        // Validate the incoming request data
        $request->validate([
            'academic_session_name' => 'required|string|max:255',
            'status' => 'required|string|in:active,in active',
        ]);



        // Set the school code
        //$school_code = '100'; // Your school code here

        // Check if any record with the same school_code, academic_session_name, or position already exists
        $existingRecord = AddAcademicSession::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('academic_session_name', $request->academic_session_name);
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same academic session name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $academicSession = new AddAcademicSession();
        $academicSession->academic_session_name = $request->academic_session_name;

        $academicSession->status = $request->status;
        // dd($academicSession);
        $academicSession->action = 'approved';
        $academicSession->school_code = $schoolCode;

        // Save the new record
        $academicSession->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'academic session added successfully!');
    }

    public function delete_add_academic_session($id)
    {
        $academicSession = AddAcademicSession::findOrFail($id);
        $academicSession->delete();
        return redirect()->back()->with('success', 'academic session deleted successfully!');
    }
}
