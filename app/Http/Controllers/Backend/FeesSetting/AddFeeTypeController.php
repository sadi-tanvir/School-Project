<?php

namespace App\Http\Controllers\Backend\FeesSetting;

use App\Http\Controllers\Controller;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;
use App\Models\AddFeeType;

class AddFeeTypeController extends Controller
{
    // view
    public function FeeTypeView(Request $request, $schoolCode)
    {
        $searchTerm = $request->input('search_types');

        $query = AddFeeType::query();

        if ($searchTerm) {
            $query->where('fee_type_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('position', 'like', '%' . $searchTerm . '%')
                ->orWhere('status', 'like', '%' . $searchTerm . '%');
        }

        $feeTypes = $query->get();

        return view('Backend.BasicInfo.FeesSetting.AddFeeType', compact('schoolCode', 'feeTypes'));
    }


    // store
    public function FeeTypeStore(Request $request, $schoolCode)
    {
        try {
            $request->validate([
                'fee_type_name' => 'required',
                'position' => 'required | integer',
            ]);

            $addFeeType = new AddFeeType();
            $addFeeType->fee_type_name = $request->input('fee_type_name');
            $addFeeType->position = $request->input('position');
            $addFeeType->status = $request->input('status') ? 'active' : 'in active';
            $addFeeType->school_code = $schoolCode;
            $addFeeType->save();

            return redirect()->route('addFeeType.view', ["schoolCode" => $schoolCode])->with('success', 'Fee Type Added Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while saving the fee type.');
        }
    }



    // delete
    public function FeeTypeDelete(Request $request, $schoolCode, $id)
    {
        try {
            $feeType = AddFeeType::where("school_code", $schoolCode)->where('id', $id)->first();
            $feeType->delete();

            return redirect()->route('addFeeType.view', ["schoolCode" => $schoolCode])->with('success', 'Fee Type Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while deleting the fee type.');
        }
    }



    // update
    public function FeeTypeUpdate(Request $request, $schoolCode, $id)
    {
        try {
            $request->validate([
                'fee_type_name' => 'required',
                'position' => 'required | integer',
            ]);

            $feeType = AddFeeType::where("school_code", $schoolCode)->where('id', $id)->first();
            $feeType->fee_type_name = $request->input('fee_type_name');
            $feeType->position = $request->input('position');
            $feeType->status = $request->input('status') ? 'active' : 'in active';
            $feeType->save();

            return redirect()->route('addFeeType.view', ["schoolCode" => $schoolCode])->with('success', 'Fee Type Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while updating the fee type.');
        }
    }

    // Print
    public function FeeTypePrint(Request $request, $schoolCode)
    {
        $feeTypes = AddFeeType::get();
        $schoolInfo = SchoolInfo::where('school_code', $schoolCode)->first();
        $date = now();
        return view('Backend.BasicInfo.FeesSetting.AllFeeTypesPrint', compact('schoolCode', 'feeTypes', 'schoolInfo', 'date'));
    }
}
