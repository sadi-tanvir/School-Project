<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddReportName;
use App\Models\AddSignature;
use App\Models\SetSignature;
use Illuminate\Http\Request;

class SetSignatureController extends Controller
{
    public function SetSignature(Request $request, $schoolCode)
    {
        $previouslySelectedReport=null;
        $reportName = null;
        $signatures = AddSignature::where('school_code', $schoolCode)->where('action', 'approved')->get();
        $reports = AddReportName::where('school_code', $schoolCode)->where('action', 'approved')->get();
        return view('Backend.BasicInfo.ExamSetting.setSignature', compact('signatures', 'reports', 'reportName','previouslySelectedReport'));

    }


    public function getSignatureData(Request $request, $school_code)
    {
        // dd($request);
        $signatures = AddSignature::where('school_code', $school_code)->where('action', 'approved')->get();
        $reports = AddReportName::where('school_code', $school_code)->where('action', 'approved')->get();
        $reportName = $request->report_name;

        $previouslySelectedReport=SetSignature::where('school_code', $school_code)->where('action', 'approved')->where('report_name',$reportName)->where('status','active')->get();
        // dd( $previouslySelectedReport);
        return view('Backend.BasicInfo.ExamSetting.setSignature', compact('signatures', 'reports', 'reportName','previouslySelectedReport'));
    }
    public function processForm(Request $request, $schoolCode)
    {
        $reportName = $request->input('reportName');
        $signatureNames = $request->input('signatureName');
        $positions = $request->input('positions');
        $statuses = $request->input('status');


        // Deactivate all signatures for the given school and report
        SetSignature::where('school_code', $schoolCode)
            ->where('report_name', $reportName)
            ->update(['status' => 'in active']);

        // Loop through each signature to update or create
        foreach ($signatureNames as $key => $signatureName) {
            $status = isset($statuses[$key]) ? 'active' : 'in active';
            $position = isset($positions[$key]) ? $positions[$key] : null;
            $isExist = SetSignature::where('school_code', $schoolCode)
                ->where('report_name', $reportName)
                ->where('signature_name', $signatureName)
                ->exists();

            if ($isExist) {
                SetSignature::where('school_code', $schoolCode)
                ->where('report_name', $reportName)
                ->where('signature_name', $signatureName)
                ->update([
                    'positions' => $position,
                    'status' => $status
                ]);
            } else {
                SetSignature::create([
                    'report_name' => $reportName,
                    'signature_name' => $signatureName,
                    'positions' => $position,
                    'status' => $status,
                    'action' => 'approved',
                    'school_code' => $schoolCode,
                ]);
            }
        }

        return redirect()->route('view.signature', $schoolCode)->with('success', 'Signatures saved successfully');
    }



}
