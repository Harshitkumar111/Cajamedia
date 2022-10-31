<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PostManagementController extends Controller
{
    public function post(){   
        $post= Post::all(); 
        return view('Admin.Post_Management.Post',compact('post'));
    }   
    public function Addpost(){   
        return view('Admin.Post_Management.Add_Post');
    }
    public function savepost(Request $request){    
        $res= new Post;        
        try {         
            $res->Title=$request->input('Title');
            $res->Description=$request->input('pagedescription'); 
            $res->Meta_title=$request->input('Meta_title');
            $res->Meta_Description=$request->input('Meta_Description');
            $res->Meta_Keyword=$request->input('Meta_Keyword');  
            $sucess=$res->save();
            return redirect('/post')->with('success', 'Success' );            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Please Check Details');
          } 
        }
        public function deletepost(Request $request) {    
            $deleteid=$request->id;       
            $post = Post::find($deleteid); 
            $post= $post->delete($deleteid);
            if($post){
                return redirect('/post')->with('success', 'delete Success');
              }else{
                return redirect()->back()->with('error', 'Please Check Page Details');
              }          
        }
        
        public function editpost($id)
        {     
            $post = Post::find($id);
            return view('Admin.Post_Management.Edit_Post', compact('post'));     
        }
        public function updatepost(Request $request){    
            $res=Post::find($request->id);       
            try {         
                $res->Title=$request->input('up_Title');
                $res->Description=$request->input('pagedescription'); 
                $res->Meta_title=$request->input('up_Meta_title');
                $res->Meta_Description=$request->input('up_Meta_Description');
                $res->Meta_Keyword=$request->input('up_Meta_Keyword');  
                $sucess=$res->save();
                return redirect('/post')->with('success', ' Update Success' );            
              } catch(\Illuminate\Database\QueryException $ex){ 
                return redirect()->back()->with('error', 'Please Check Details');
              } 
            }
}
