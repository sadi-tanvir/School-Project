<?php

namespace App\Http\Controllers\Backend\Message;

use App\Http\Controllers\Controller;
use App\Models\AddMsg;
use Illuminate\Http\Request;

class AddMsgController extends Controller
{
    public function addMsg(){
        return view ('Backend.Messaging.addMessage');
       }
       public function addInstruction(Request $request){
       
        $message=new AddMsg();
        $message->message = $request->message;
        $message->school_code = $request->school_code;
        $message->action = "approved";
        $message->save();

        return redirect()->back()->with('success','Message added successfully');

       } 
}
