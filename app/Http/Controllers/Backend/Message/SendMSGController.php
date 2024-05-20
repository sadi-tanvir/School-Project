<?php

namespace App\Http\Controllers\Backend\Message;

use App\Http\Controllers\Controller;
use App\Models\AddAcademicSession;
use App\Models\AddAcademicYear;
use App\Models\AddCategory;
use App\Models\AddClassWiseGroup;
use App\Models\AddClassWiseSection;
use App\Models\AddClassWiseShift;
use App\Models\AddMsg;
use App\Models\Contact;
use App\Models\Message;
use App\Models\AddClass;
use App\Models\AddSection;
use App\Models\AddGroup;
use App\Models\AddShift;
use App\Models\Student;
use Illuminate\Http\Request;

class SendMSGController extends Controller
{
    public function message($school_code){
        $students=null;
        $class=null;
        $section=null;
        $shift=null;
        $group=null;
        $sms=null;
        $category=null;
        $session=null;
            $subject=null;
            $status=null;
            $year=null;
        $contacts=Contact::orderBy('created_at', 'desc')->where('school_code',$school_code)->where('action','approved')->get();
        $messages = AddMsg::where('school_code',$school_code)->where('action','approved')->get();
        $classes=AddClass::where('school_code',$school_code)->where('action','approved')->get();
        $sections=AddSection::where('school_code',$school_code)->where('action','approved')->get();
        $groups=AddGroup::where('school_code',$school_code)->where('action','approved')->get();
        $shifts=AddShift::where('school_code',$school_code)->where('action','approved')->get();
        $categories=AddCategory::where('school_code',$school_code)->where('action','approved')->get();
        $sessions=AddAcademicSession::where('school_code',$school_code)->where('action','approved')->get();
        $years=AddAcademicYear::where('school_code',$school_code)->where('action','approved')->get();
        return view ('Backend.Messaging.sendMessage',compact('contacts','messages','classes','sections','groups','shifts','students','categories','sessions','years','sms'));
       }



       public function getGroups(Request $request, $school_code)
    {
        $class = $request->class;

        $groups = AddClassWiseGroup::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($groups);
    }

    public function getSections(Request $request, $school_code)
    {
        $class = $request->class;
        $sections = AddClassWiseSection::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($sections);
    }

    public function getShifts(Request $request, $school_code)
    {
        $class = $request->class;
        $shifts = AddClassWiseShift::where('class_name', $class)->where('school_code', $school_code)->get();
        return response()->json($shifts);
    }




       public function getContact(Request $request){
        
            $class=$request->input('class_name');
            $section=$request->input('section_name');
            $group=$request->input('group_name');
            $shift=$request->input('shift_name');
            $category=$request->input('category_name');
            $session=$request->input('session_name');
            $subject=$request->input('subject_name');
            $status=$request->input('status_name');
            $year=$request->input('year_name');
            $sms=$request->input('message');
            $school_code=$request->input('school_code');
            $students=null;
if(!$year){
    return redirect()->route('message',$school_code)->with('error', 'You must select an academic year');
}



            if($class){
                $students=Student::where('school_code',$school_code)->where('action','approved')->where('class_name',$class)->where('year',$year)->get();
            }elseif($year){
                $students=Student::where('school_code',$school_code)->where('action','approved')->where('year',$year)->get();
            }
            elseif($section){
                $students=Student::where('school_code',$school_code)->where('action','approved')->where('class_name',$class)->where('section',$section)->where('year',$year)->get();
            }
            elseif($group){
                $students=Student::where('school_code',$school_code)->where('action','approved')->where('class_name',$class)->where('section',$section)->where('group',$group)->where('year',$year)->get();
            }
            elseif($shift){
                $students=Student::where('school_code',$school_code)->where('action','approved')->where('class_name',$class)->where('section',$section)->where('group',$group)->where('shift',$shift)->where('year',$year)->get();
            }
            else {
                $students=Student::where('school_code',$school_code)->where('action','approved')->where('class_name',$class)->where('section',$section)->where('group',$group)->where('shift',$shift)->where('category',$category)->where('year',$year)->get();
            }
            
           
           
            
            



            $contacts=Contact::orderBy('created_at', 'desc')->where('school_code',$school_code)->where('action','approved')->get();
        $messages = AddMsg::where('school_code',$school_code)->where('action','approved')->get();
        $classes=AddClass::where('school_code',$school_code)->where('action','approved')->get();
        $sections=AddSection::where('school_code',$school_code)->where('action','approved')->get();
        $groups=AddGroup::where('school_code',$school_code)->where('action','approved')->get();
        $shifts=AddShift::where('school_code',$school_code)->where('action','approved')->get();
        $categories=AddCategory::where('school_code',$school_code)->where('action','approved')->get();
        $sessions=AddAcademicSession::where('school_code',$school_code)->where('action','approved')->get();
        $years=AddAcademicYear::where('school_code',$school_code)->where('action','approved')->get();
            return view('Backend.Messaging.sendMessage',compact('class','shift','group','section','school_code','students','contacts','messages','classes','sections','groups','shifts','categories','sessions','years','sms'));
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
    
        return redirect()->route('message',$school_code)->with('success', 'SMS sent successfully');
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

public function deleteSelectedContacts(Request $request)
{
    $selectedContacts = $request->input('selectedContacts');
    Contact::whereIn('id', $selectedContacts)->delete();

    return response()->json(['message' => 'Selected contacts deleted successfully']);
}


}
