<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site_Management;

class SiteManagementController extends Controller
{
    public function index(){   
        $site= Site_Management::all(); 
        return view('Admin.Site_Management.index',compact('site'));
    }
    public function Addsite(){   
        return view('Admin.Site_Management.Add');
    }
    public function save(Request $request){    
        $res= new Site_Management;        
        try {         
            $res->Site_name=$request->input('Site_name');
            $res->Phone_number=$request->input('Phone_number'); 
            $res->Email_address=$request->input('Email_address');
            $res->Address=$request->input('Address');
            $res->About_us_info=$request->input('About_us_info'); 
            $res->Copyright=$request->input('Copyright');  
 
            $sucess=$res->save();
            return redirect('/site')->with('success', 'Success' );            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Please Check Details');
          } 
        }
        public function editsite($id)
        {     
            $site = Site_Management::find($id);
            return view('Admin.Site_Management.Edit', compact('site'));     
        }
        
        public function updatesite(Request $request){    
            $res= Site_Management::find($request->id);        
            try {         
                $res->Site_name=$request->input('Site_name');
                $res->Phone_number=$request->input('Phone_number'); 
                $res->Email_address=$request->input('Email_address');
                $res->Address=$request->input('Address');
                $res->About_us_info=$request->input('About_us_info'); 
                $res->Copyright=$request->input('Copyright');
                $sucess=$res->save();
                return redirect('/site')->with('success', 'Update Success' );            
              } catch(\Illuminate\Database\QueryException $ex){ 
                return redirect()->back()->with('error', 'Please Check Details');
              } 
            }
            public function deletesite(Request $request) {    
                $deleteid=$request->id;       
                $site = Site_Management::find($deleteid); 
                $site= $site->delete($deleteid);
                if($site){
                    return redirect('/site')->with('success', 'delete Success');
                  }else{
                    return redirect()->back()->with('error', 'Please Check Page Details');
                  }          
            }
}
