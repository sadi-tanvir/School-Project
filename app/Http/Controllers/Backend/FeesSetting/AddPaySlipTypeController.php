<?php

namespace App\Http\Controllers\Backend\FeesSetting;

use App\Http\Controllers\Controller;
use App\Models\AddPaySlipType;
use Illuminate\Http\Request;

class AddPaySlipTypeController extends Controller
{
    public function AddPaySlipTypeView(Request $request, $school_code)
    {
        $searchTerm = $request->input('search_types');

        $query = AddPaySlipType::query();

        if ($searchTerm) {
            $query->where("school_code", $school_code)
                ->where('action', 'approved')
                ->where('pay_slip_type_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('status', 'like', '%' . $searchTerm . '%');
        }

        $allPaySlipTypes = $query->get();

        return view('Backend.BasicInfo.FeesSetting.AddPaySlipType', compact('school_code', 'allPaySlipTypes'));
    }

    public function StorePaySlipType(Request $request, $school_code)
    {
        try {
            $request->validate([
                'pay_slip_type_name' => 'required',
            ]);
            $pay_slip_type_name = $request->input('pay_slip_type_name');
            $status = $request->input('status') ? "active" : 'inactive';

            $AddPaySlipType = new AddPaySlipType();
            $AddPaySlipType->pay_slip_type_name = $pay_slip_type_name;
            $AddPaySlipType->school_code = $school_code;
            $AddPaySlipType->status = $status;
            $AddPaySlipType->save();
            return redirect()->back()->withSuccess('Pay Slip Type name has been added successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withError('Failed to add Pay Slip Type name. Please try again.');
        }
    }


    public function deletePaySlipType(Request $request, $school_code, $id)
    {
        try {
            $PaySlipType = AddPaySlipType::where('school_code', $school_code)->where('id', $id)->first();
            $PaySlipType->delete();
            return redirect()->back()->withSuccess('Pay Slip Type name has been deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withError('Failed to delete Pay Slip Type name. Please try again.');
        }
    }

    public function updatePaySlipType(Request $request, $school_code, $id)
    {
        try {
            $PaySlipType = AddPaySlipType::where('school_code', $school_code)->where('id', $id)->first();
            $PaySlipType->pay_slip_type_name = $request->input('pay_slip_type_name');
            $PaySlipType->status = $request->input('status') ? "active" : 'inactive';
            $PaySlipType->save();
            return redirect()->back()->withSuccess('Pay Slip Type name has been updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withError('Failed to update Pay Slip Type name. Please try again.');
        }
    }
}
