<?php

namespace App\Http\Controllers\Backend\FeesSetting;

use App\Http\Controllers\Controller;
use App\Models\AddWaiverType;
use Illuminate\Http\Request;

class WaiverTypeController extends Controller
{
    public function WaiverTypeView(Request $request, $school_code)
    {
        // $waiverTypes = AddWaiverType::where("school_code", $school_code)->where('action', 'approved')->get();

        $searchTerm = $request->input('search_types');

        $query = AddWaiverType::query();

        if ($searchTerm) {
            $query->where("school_code", $school_code)
                ->where('action', 'approved')
                ->where('waiver_type_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('status', 'like', '%' . $searchTerm . '%');
        }

        $waiverTypes = $query->get();


        return view('Backend.BasicInfo.FeesSetting.WaiverType', compact('school_code', 'waiverTypes'));
    }

    public function StoreWaiverType(Request $request, $school_code)
    {
        try {
            $waiver_type = new AddWaiverType();
            $waiver_type->waiver_type_name = $request->input('waiver_type_name');
            $waiver_type->status = $request->input('status') ? "active" : "inactive";
            $waiver_type->school_code = $school_code;
            $waiver_type->save();
            return redirect()->back()->withSuccess('Waiver Type name has been added successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withError('Failed to add Waiver Type name. Please try again.');
        }
    }

    public function DeleteWaiverType(Request $request, $school_code, $id)
    {
        try {
            $waiver_type = AddWaiverType::where("school_code", $school_code)->where('action', 'approved')->where("id", $id)->first();
            $waiver_type->delete();
            return redirect()->back()->withSuccess('Waiver Type name has been deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withError('Failed to add Waiver Type name. Please try again.');
        }
    }

    public function UpdateWaiverType(Request $request, $school_code, $id)
    {
        try {
            $waiver_type = AddWaiverType::where("school_code", $school_code)->where('action', 'approved')->where("id", $id)->first();
            $waiver_type->waiver_type_name = $request->input('waiver_type_name');
            $waiver_type->status = $request->input('status') ? "active" : "inactive";
            $waiver_type->save();
            return redirect()->back()->withSuccess('Waiver Type name has been deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withError('Failed to add Waiver Type name. Please try again.');
        }
    }
}
