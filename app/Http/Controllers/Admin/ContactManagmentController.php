<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactManagmentController extends Controller
{
    public function contact(){  
        
        $Contact= Contact::all(); 
        return view('Admin.Contact.contact',compact('Contact'));
    }
    
    public function deletecontact(Request $request) {    
        $deleteid=$request->id;      
        $Contact = Contact::find($deleteid); 
        $Contacts= $Contact->delete($deleteid);
        if($Contacts){
            return redirect('/contact')->with('success', 'Delete Success');
          }else{
            return redirect()->back()->with('error', 'Please Check Payment Details');
          }
    }
}
