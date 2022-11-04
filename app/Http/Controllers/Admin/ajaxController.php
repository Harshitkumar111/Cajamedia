<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ajax;
class ajaxController extends Controller
{
    public function index(){   
        
       return view('Admin.Ajax.index');
   }
   public function saveajax(Request $request) 
   {
       $res=new Ajax;
       
       $res->name=$request->input('name');
       $res->email=$request->input('email');
       $res->phone=$request->input('number');
    //    $res->course=$request->input('course');
    //    if($request->hasfile('fileToUpload')){
    //        $file= $request->file('fileToUpload');
    //        $filename= date('YmdHi').$file->getClientOriginalName();
    //        $file-> move(public_path('public/image'), $filename);
    //        $res->image=$filename;
           
    //    }      
       $sucess= $res->save();
     //  $request->session()->flash('msg','submitted');
       if($sucess){
           echo "1";
       }else{
           echo "0";
       }
   }
   public function tablerecord()
   {
            
    $info=Ajax::all();
    
     $data="";
     $number=1;
     foreach($info as $row){
    
           $data .= '<tr>
           <td>'.$number.'</td>
          
           <td>'.$row['name'].'</td>
           <td>'.$row['email'].'</td>
           <td>'.$row['phone'].'</td>

           <td><button type="button" onClick="DeleteUser('.$row->id.')" class="btn btn-warning">Delete</button> &nbsp;&nbsp;

           <button type="button" onClick="GetData('.$row->id.')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateexampleModal">Update</button>
           </td>
   
        </tr>';
        $number++;
       }
    

   echo $data;
}

public function deletedata(Request $request) {  
  
    $deleteid=$request->deleteid;
    $Users = Ajax::find($deleteid); 
    $result= $Users->delete($deleteid);
    if($result){
        echo "1";
      }else{
        echo "0";
      }
}

public function GetUser(Request $request){
    $editid=$request->editid;
    $Users = Ajax::find($editid);
    echo json_encode($Users);
}

public function upajax(Request $request) 
{
    $update=Ajax::find($request->id);   
    
    $update->name=$request->input('name');
    $update->email=$request->input('email');
    $update->phone=$request->input('number');
     
    $sucess= $update->save();
    if($sucess){
        echo "1";
    }else{
        echo "0";
    }
}

}
