<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order_details;
use App\Models\Order_items;
use App\Models\Payment_details;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OrderManagmentController extends Controller
{
    public function order(){  
        $order_details= Order_details::all();  
        $order_items= Order_items::all(); 
        return view('Admin.Manage_Order.Order',compact('order_details','order_items'));
    }
    






// payment details---------------------------------------------------------------------------------

    public function payment(){  
        $Payment_detail= Payment_details::all();  
        return view('Admin.Payment.All_payment',compact('Payment_detail'));
    }
    public function delete_payment_details(Request $request) {    
        $deleteid=$request->id;       
        $Payment_id = Payment_details::find($deleteid); 
        $payment= $Payment_id->delete($deleteid);
        if($payment){
            return redirect('/payment')->with('successs', 'D elete Success');
          }else{
            return redirect()->back()->with('error', 'Please Check Payment Details');
          }
    }
    public function edit_payment_details($id)
    {     
        $Payment_detail = Payment_details::find($id);
        return view('Admin.Payment.edit_payment_details', compact('Payment_detail'));     
    }
    
    public function update_payment_details(Request $request){    
        $res=Payment_details::find($request->id);        
        try { 
                 
            $res->amount=$request->input('amount');
            $res->provider=$request->input('provider'); 
            $res->status=$request->input('status');  
            $sucess= $res->save();
            return redirect('/payment')->with('success', 'Update Success' );            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Please Check Details');
          } 
   }
}
