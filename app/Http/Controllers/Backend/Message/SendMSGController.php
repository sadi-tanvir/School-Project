<?php

namespace App\Http\Controllers\Backend\Message;

use App\Http\Controllers\Controller;
use App\Models\AddMsg;
use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;

class SendMSGController extends Controller
{
    public function message($school_code){
        $contacts=Contact::where('school_code',$school_code)->where('action','approved')->get();
        $messages = AddMsg::where('school_code',$school_code)->where('action','approved')->get();
        return view ('Backend.Messaging.sendMessage',compact('contacts','messages'));
       }

       public function sendMessage(Request $request){
        $contacts = $request->contact;
        $messages = $request->message;
        $messageEncoded = urlencode($messages);
        $school_code = $request->school_code;
        $sid = "Bdassociateeng";
    
        foreach($contacts as $contact){
            // Check if message is not empty before sending SMS
            if (!empty($messages)) {
                // Send SMS only if there's a message
                $url = "http://api.boom-cast.com/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?masking=NOMASK&userName=bassociate&password=8d611d3ea607e1e12f0f3440c314c3c1&MsgType=TEXT&receiver=$contact&message=$messageEncoded";
                $param = "user=bassociate&pass=8d611d3ea607e1e12f0f3440c314c3c1&sms[0][0]= $contact&sms[0][1]=" . urlencode("$request->message") . "&sms[0][2]=123456789&sid=$sid";
    
                $crl = curl_init();
                curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($crl, CURLOPT_URL, $url);
                curl_setopt($crl, CURLOPT_HEADER, 0);
                curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($crl, CURLOPT_POST, 1);
                curl_setopt($crl, CURLOPT_POSTFIELDS, $param);
                $response = curl_exec($crl);
                curl_close($crl);
            }
    
            // Save message to database only if there's a message
            if (!empty($messages)) {
                $message = new Message();
                $message->message = $messageEncoded;
                $message->contact = $contact;
                $message->school_code = $school_code;
                $message->save();
            }
        }
    
        return redirect()->back()->with('success', 'SMS sent successfully');
    }
    

    public function delete_add_contact($id)
{
    try {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(['message' => 'Contact deleted successfully']);
    } 
    catch (\Exception $e) {
        return response()->json(['error' => 'Failed to delete contact'], 500);
    }
}

}
