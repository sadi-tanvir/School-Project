<?php

namespace App\Http\Controllers\Backend\Message;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\TotalContact;
use Illuminate\Http\Request;

class AddContactController extends Controller
{
   public function Contact(){
    return view ('Backend.Messaging.addContact');
   }

   public function addContact(Request $request){
      
      $existingContact=Contact::where('school_code',$request->school_code)->where('action','approved')->where('contact',$request->contact)->exists();
// dd($existingContact);
      if($existingContact){
         return redirect()->back()->with('error','Contact already added');
      }
         $contact=new Contact();
         $contact->name = $request->name;
         $contact->contact = $request->contact;
         $contact->school_code = $request->school_code;
         $contact->action = "approved";
         $contact->save();


         //total contact
         $tContact=new TotalContact();
         $tContact->name = $request->name;
         $tContact->contact = $request->contact;
         $tContact->school_code = $request->school_code;
         $tContact->action = "approved";
         $tContact->save();



         return redirect()->back()->with('success','Contact added successfully');

   }

  
   
}
