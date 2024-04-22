<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddSubject;
use Illuminate\Http\Request;

class AddSubjectController extends Controller
{
    public function add_subject($schoolCode)
    {
       // $school_code = '100';
        $subjectData = AddSubject::where('action', 'approved')->where('school_code', $schoolCode)->get();

        return view('Backend/BasicInfo/CommonSetting/addSubject', compact('subjectData'));
    }

    public function store_add_subject(Request $request,$schoolCode)
    {
        // Validate the incoming request data
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|string|in:active,in active',
        ]);

        // Set the school code
       // $school_code = '100'; // Your school code here

        // Check if any record with the same school_code, subject_name, or position already exists
        $existingRecord = AddSubject::where('school_code',$schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('subject_name', $request->subject_name)
                    ->orWhere('position', $request->position);
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same subject name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $subject = new AddSubject();
        $subject->subject_name = $request->subject_name;
        $subject->subject_code = $request->subject_code;
        $subject->position = $request->position;
        $subject->status = $request->status;
        // dd($subject);
        $subject->action = 'approved';
        $subject->school_code = $schoolCode;

        // Save the new record
        $subject->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Subject added successfully!');
    }

    public function delete_add_subject($id)
    {
        $subject = AddSubject::findOrFail($id);
        $subject->delete();
        return redirect()->back()->with('success', 'Subject deleted successfully!');
    }
}
