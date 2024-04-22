<?php

namespace App\Http\Controllers\Backend\CommonSetting;

use App\Http\Controllers\Controller;
use App\Models\AddBoardExam;
use Illuminate\Http\Request;

class AddBoardExamController extends Controller
{
    public function add_board_exam($schoolCode)
    {
       // $school_code = '100';
        $boardExamData = AddBoardExam::where('action', 'approved')->where('school_code', $schoolCode)->get();
       
        return view('Backend/BasicInfo/CommonSetting/addBoardExam', compact('boardExamData'));
    }

    public function store_add_board_exam(Request $request,$schoolCode)
    {
        // Validate the incoming request data
        $request->validate([
            'board_exam_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|string|in:active,in active',
        ]);

        // Set the school code
        //$school_code = '100'; // Your school code here

        // Check if any record with the same school_code, board_exam_name, or position already exists
        $existingRecord = AddBoardExam::where('school_code', $schoolCode)
            ->where(function ($query) use ($request) {
                $query->where('board_exam_name', $request->board_exam_name)
                    ->orWhere('position', $request->position);
            })
            ->exists();

        // If a record with the same combination already exists, return with an error message
        if ($existingRecord) {
            return redirect()->back()->with('error', 'A record with the same board exam name or position already exists for this school.');
        }

        // If no duplicate record is found, proceed to create a new record
        $boardExam = new AddBoardExam();
        $boardExam->board_exam_name = $request->board_exam_name;
        $boardExam->position = $request->position;
        $boardExam->status = $request->status;
        // dd($boardExam);
        $boardExam->action = 'approved';
        $boardExam->school_code = $schoolCode;

        // Save the new record
        $boardExam->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'board exam added successfully!');
    }

    public function delete_add_board_exam($id)
    {
        $boardExam = AddBoardExam::findOrFail($id);
        $boardExam->delete();
        return redirect()->back()->with('success', 'board exam deleted successfully!');
    }
}
