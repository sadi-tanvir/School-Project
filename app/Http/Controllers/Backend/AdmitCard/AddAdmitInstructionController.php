<?php

namespace App\Http\Controllers\Backend\AdmitCard;

use App\Http\Controllers\Controller;
use App\Models\AdmitInstruction;
use Illuminate\Http\Request;

class AddAdmitInstructionController extends Controller
{
 public function AddAdmitInstruction(){
    return view ('Backend/AdmitCard/Report(admitCards)/addAdmitInstruction');
 }

 public function instructionInsert(Request $request,$schoolCode){
   $request->validate([
      'instruction' => 'required|string',
 
  ]);
  $addinstruction = new AdmitInstruction();
  $addinstruction->instruction = $request->instruction;
  $addinstruction->status = $request->status;
  // dd($class);
  $addinstruction->action = 'approved';
  $addinstruction->school_code = $schoolCode;

  // Save the new record
  $addinstruction->save();

  // Redirect back with a success message
  return redirect()->route('addAdmitinstruction',$schoolCode)->with('success', 'admit instruction added successfully!');

 }

}
