<?php

namespace App\Http\Controllers\Backend\Machine_Attendence;

use App\Http\Requests\StoreAttendanceRequest;

use App\Http\Controllers\Controller;
use App\Models\Machine_Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MachineAttendenceController extends Controller
{
    public function store(StoreAttendanceRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|string|max:255',
            'in_time' => 'required|date',
            'out_time' => 'required|date',
            'machine_no' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $data = $validator->validated();

        $existingAttendance = Machine_Attendance::where('student_id', $request->student_id)
            ->where('in_time', $request->in_time)
            ->first();

        if ($existingAttendance) {
            return response()->json(['error' => 'This user attendance already taken'], 400);
        } else {
            $attendance = Machine_Attendance::create($data);
        }
        return response()->json(['message' => 'Attendance created successfully', 'data' => $attendance], 201);
    }


    public function index()
    {
        $attendances = Machine_Attendance::all();
        return response()->json(['data' => $attendances], 200);
    }

    public function show($id)
    {
        $attendance = Machine_Attendance::find($id);

        if (!$attendance) {
            return response()->json(['error' => 'Attendance record not found'], 404);
        }

        return response()->json(['data' => $attendance], 200);
    }



    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|string|max:255',
            'in_time' => 'required|date',
            'out_time' => 'required|date',
            'machine_no' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $attendance = Machine_Attendance::find($id);

        if (!$attendance) {
            return response()->json(['error' => 'Attendance record not found'], 404);
        }

        $attendance->update($validator->validated());

        return response()->json(['message' => 'Attendance updated successfully', 'data' => $attendance], 200);
    }



    public function destroy($id)
    {
        $attendance = Machine_Attendance::find($id);

        if (!$attendance) {
            return response()->json(['error' => 'Attendance record not found'], 404);
        }

        $attendance->delete();

        return response()->json(['message' => 'Attendance deleted successfully'], 200);
    }

}
