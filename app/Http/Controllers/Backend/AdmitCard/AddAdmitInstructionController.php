<?php

namespace App\Http\Controllers\Backend\AdmitCard;

use App\Http\Controllers\Controller;
use App\Models\AdmitInstruction;
use Illuminate\Http\Request;

class AddAdmitInstructionController extends Controller
{
   public function AddAdmitInstruction()
   {
      return view('Backend/AdmitCard/Report(admitCards)/addAdmitInstruction');
   }

   public function instructionInsert(Request $request, $schoolCode)
   {
      $request->validate([
         'instruction' => 'required|string',

      ]);
      $count = AdmitInstruction::where('school_code', $schoolCode)->count();
      // Count the number of characters in the instruction
      $instructionLength = strlen($request->instruction);
      if ($count < 4) {
         if ($instructionLength < 125) {
            $addinstruction = new AdmitInstruction();
            $addinstruction->instruction = $request->instruction;
            $addinstruction->status = $request->status;
            // dd($class);
            $addinstruction->action = 'approved';
            $addinstruction->school_code = $schoolCode;
            // Save the new record
            $addinstruction->save();

            // Redirect back with a success message
            return redirect()->route('addAdmitinstruction', $schoolCode)->with('success', 'admit instruction added successfully!');
         }
         return redirect()->route('addAdmitinstruction', $schoolCode)->with('error', 'instruction length is out of bound !');
      }

      return redirect()->route('addAdmitinstruction', $schoolCode)->with('error', ' 4 instruction already added,please delete first!');

   }

}
