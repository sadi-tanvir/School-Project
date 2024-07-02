<?php

namespace App\Http\Controllers\Backend\NEDUB;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SchoolAdmin;
use App\Models\Student;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function viewSetting()
    {
        return view('Backend.NEDUBD.settings');
    }
    public function changePhoto(Request $request, $role, $id, $school_code)
    {
        $admin = Admin::where('id', $id)->where('role', $role)->first();
        $schoolAdmin = SchoolAdmin::where('id', $id)->where('role', $role)->first();
        $student = Student::where('id', $id)->where('role', $role)->first();
        $previous_image = $request->previous_image;
        if ($admin) {


            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if (file_exists(public_path($admin->image))) {
                    unlink(public_path($admin->image));
                }
                // Save the new image
                $imagePath = $request->file('image')->move('images/admin', $request->input('role') . '_' . uniqid() . '.' . $request->file('image')->extension());
                $AdminImage = 'images/admin/' . basename($imagePath);
            } else {
                $AdminImage = $previous_image;
            }

            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');


            // Update the database
            $admin->update([
                "image" => $AdminImage,
                "first_name" => $first_name,
                "last_name" => $last_name,
            ]);

            return redirect()->back()->with('success', 'Picture updated successfully');
        } else if ($schoolAdmin) {


            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if (file_exists(public_path($schoolAdmin->image))) {
                    unlink(public_path($schoolAdmin->image));
                }
                // Save the new image
                $adminPath = $request->file('image')->move('images/admin', $school_code . '_' . uniqid() . '.' . $request->file('image')->extension());
                $adminImage = 'images/admin/' . basename($adminPath);
            } else {
                $adminImage = $previous_image;
            }

            $name = $request->input('name');

            // Update the database
            $schoolAdmin->update([
                "image" => $adminImage,
                "name" => $name
            ]);

            return redirect()->back()->with('success', 'Picture updated successfully');
        } else if ($student) {


            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if (file_exists(public_path($student->image))) {
                    unlink(public_path($student->image));
                }
                // Save the new image
                $imagePath = $request->file('image')->move('images/student', $school_code . '_' . uniqid() . '.' . $request->file('image')->extension());
                $studentImage = 'images/student/' . basename($imagePath);
            } else {
                $studentImage = $previous_image;
            }

            $name = $request->input('name');
            $student->update([
                "image" => $studentImage,
                "name" => $name
            ]);

            return redirect()->back()->with('success', 'Picture updated successfully');
        }




    }
}
