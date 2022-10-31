<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageManagementController extends Controller
{
    public function Addpage(){   
        return view('Admin.Page.Add_Page');
    }
    public function page(){   
        $page= Page::all(); 
        return view('Admin.Page.Page',compact('page'));
    }      
        public function savepage(Request $request){    
            $res= new Page;        
            try {         
                $res->Title=$request->input('Title');
                $res->Description=$request->input('pagedescription'); 
                $res->Meta_title=$request->input('Meta_title');
                $res->Meta_Description=$request->input('Meta_Description');
                $res->Meta_Keyword=$request->input('Meta_Keyword');  
                $sucess=$res->save();
                return redirect('/page')->with('success', 'Success' );            
              } catch(\Illuminate\Database\QueryException $ex){ 
                return redirect()->back()->with('error', 'Please Check Details');
              } 
            }
              public function deletepage(Request $request) {    
                $deleteid=$request->id;       
                $page = Page::find($deleteid); 
                $pages= $page->delete($deleteid);
                if($pages){
                    return redirect('/page')->with('success', 'delete Success');
                  }else{
                    return redirect()->back()->with('error', 'Please Check Page Details');
                  }          
            }
            public function editpage($id)
            {     
                $page = Page::find($id);
                return view('Admin.Page.Edit_Page', compact('page'));     
            }
            public function updatepage(Request $request){    
                $res=Page::find($request->id);       
                try {         
                    $res->Title=$request->input('up_Title');
                    $res->Description=$request->input('pagedescription'); 
                    $res->Meta_title=$request->input('up_Meta_title');
                    $res->Meta_Description=$request->input('up_Meta_Description');
                    $res->Meta_Keyword=$request->input('up_Meta_Keyword');  
                    $sucess=$res->save();
                    return redirect('/page')->with('success', 'Update Success' );            
                  } catch(\Illuminate\Database\QueryException $ex){ 
                    return redirect()->back()->with('error', 'Please Check Details');
                  } 
                }
}
