<?php

namespace App\Http\Controllers\Admin;
use Mail;
use App\Mail\TestEmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email_Management;
use App\Models\User;
use Auth;
class EmailManagementController extends Controller
{
    public function email(){   
        // $seo= Email_Management::find(1); ,compact('seo')
       return view('Admin.Email_Management.View_Email');
   }
   public function addemail(){  
    $email=User::all();  
   return view('Admin.Email_Management.Add_Email_Event',compact('email'));
}



// dd("Mail Sent Successfully!");
public function saveemail(Request $request){  
  $messages =$request->input('pagedescription');
  $name=$request->input('subject');
  $ms=strip_tags($messages);
       
 $mailData = [
    "name" => $name,
    "msg" => $ms,
  ];
  
  Mail::to("info@cajamedia.com")->send(new TestEmail($mailData));
    $res= new Email_Management;       
    try {        
  
        $res->subject =$request->input('subject');
        $res->message =$request->input('pagedescription');
      
        $emails=implode(',',$request->email);
        $res->email=$emails; 
        $sucess=$res->save();
        return redirect('/email')->with('success', 'Success' );            
      } catch(\Illuminate\Database\QueryException $ex){ 
        return redirect()->back()->with('error', 'Please Check Details');
      } 
    }
}
