<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SEO;
class SEOManagementController extends Controller
{
    public function index(){   
         $seo= SEO::find(1); 
        return view('Admin.SEO_Management.index',compact('seo'));
    }
    
    public function store(Request $request){    
        $res= SEO::find(1);       
        try {         
            $res->Analytics =$request->input('Analytics');
            $res->Header_Code=$request->input('Header_Code'); 
            $res->Footer_Code=$request->input('Footer_Code');
             
 
            $sucess=$res->save();
            return redirect('/seo')->with('success', 'Update Success' );            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Please Check Details');
          } 
        }
}

