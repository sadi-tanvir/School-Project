<?php

namespace App\Http\Controllers\Backend\ExamSetting;

use App\Http\Controllers\Controller;
use App\Models\AddReportName;
use App\Models\SetSignature;
use Illuminate\Http\Request;

class SetSignatureController extends Controller
{
    public function SetSignature(Request $request, $schoolCode)
    {
        if ($request->has('report_name')) {
            $selectedReport = $request->input('report_name');
            $reports = AddReportName::where('action', 'approved')->where('school_code', $schoolCode)->get();
            return view('Backend.BasicInfo.ExamSetting.setSignature', compact('reports', 'selectedReport'));
        } else {
            $selectedReport = null;
            $reports = AddReportName::where('action', 'approved')->where('school_code', $schoolCode)->get();
            return view('Backend.BasicInfo.ExamSetting.setSignature', compact('reports', 'selectedReport'));
        }
    }

    public function processForm(Request $request, $schoolCode)
{
    $request->validate([
        'report_name' => 'required|string',
        'signature_name.*' => 'required|string',
        'positions.*' => 'required|string',
        'status.*' => 'required|string',
    ]);

    $reportName = $request->input('report_name');
    $signatureNames = $request->input('signature_name');
    $positions = $request->input('positions');
    $statuses = $request->input('status');

    // Loop through the arrays and save/update each signature
    foreach ($signatureNames as $index => $signatureName) {
        // Check if the signature already exists
        $existingSignature = SetSignature::where('action', 'approved')
            ->where('school_code', $schoolCode)
            ->where('report_name', $reportName)
            ->where('signature_name', $signatureName)
            ->first();

        if ($existingSignature) {
            // If the signature exists, update its positions
            $existingSignature->update([
                'positions' => $positions[$index],
                'status' => $statuses[$index],
            ]);
        } else {
            // If the signature doesn't exist, create a new one
            SetSignature::create([
                'report_name' => $reportName,
                'signature_name' => $signatureName,
                'positions' => $positions[$index],
                'status' => $statuses[$index],
                'action' => 'approved',
                'school_code' => $schoolCode,
            ]);
        }
    }

    return redirect()->route('view.signature', $schoolCode)->with('success', 'Signatures saved successfully');
}

}
