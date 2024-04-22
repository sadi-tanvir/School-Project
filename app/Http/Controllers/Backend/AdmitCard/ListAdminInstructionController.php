<?php

namespace App\Http\Controllers\Backend\AdmitCard;

use App\Http\Controllers\Controller;
use App\Models\AdmitInstruction;
use Illuminate\Http\Request;

class ListAdminInstructionController extends Controller
{
    public function ListAdminInstruction($schoolCode){
        $Data = AdmitInstruction::where('action', 'approved')->where('school_code', $schoolCode)->get();
        return view('Backend/AdmitCard/Report(admitCards)/listAdminInstruction',compact('Data'));
    }
    public function delete_instruction($id)
    {
        $instruction = AdmitInstruction::findOrFail($id);
        $instruction->delete();
        return redirect()->back()->with('success', 'instruction deleted successfully!');
    }
}
