<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AddSupplierController extends Controller
{
    public function index()
    {
        $city= City::all();
        $state= State::all();
        $country= Country::all();
        return view('Admin.AddSupplier', compact('city','state','country'));
        
    }
    public function addmember(Request $request)
    {
           $validator = Validator::make($request->all(), [
              'password' => 'required|min:8',
            ]); 
            if ($validator->fails()) {           
                $messages=$validator->errors()->all();
                return redirect()->back()->with('error', 'Please Enter a valid Password');

            }
            $validator = Validator::make($request->all(),[
              'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
              ]);
              if ($validator->fails()) {           
                $messages=$validator->errors()->all();
                return redirect('member')->with('error', 'Please Enter a valid Phone Number');              
            }
        $res=new User;       
        try {             
            $res->first_name=$request->input('first_name');
            $res->last_name=$request->input('last_name');
            $res->email=$request->input('email');
            $res->phone_number=$request->input('phone_number');
            $res->password=Hash::make($request->input('password'));
            $res->user_type=$request->input('user_type');
            $res->city=$request->input('city');
            $res->state=$request->input('state');
            $res->country=$request->input('country');
            $sucess= $res->save();
            return redirect('fetchuser')->with('sucess', 'Success' );            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Please Check Email');
          }       
    }
    public function mamber()
    {       
        $alluser=User::paginate(6);
        return view('Admin.Allmamber',compact('alluser'));       
    }
   
    public function deletemember(Request $request) {    
        $deleteid=$request->id;
        
        $Users = User::find($deleteid); 
        $member= $Users->delete($deleteid);
        if($member){
            return redirect('/fetchuser')->with('sucess', 'delete Success');
          }else{
            echo "0";
          }
    }    
    public function editmember($id)
    {
        $city= City::all();
        $state= State::all();
        $country= Country::all();
        $editmember= User::find($id);
        return view('Admin.editmember', compact('editmember','city','state','country'));
        
        
    }
    public function updatemember(Request $request)
    {
        $res=User::find($request->id);

         try { 
           
            $res->first_name=$request->input('update_first_name');
            $res->last_name=$request->input('update_last_name');
            $res->email=$request->input('update_email');
            $res->phone_number=$request->input('update_phone_number');
            $res->user_type=$request->input('update_user_type');
            $res->city=$request->input('update_city');
            $res->state=$request->input('update_state');
            $res->country=$request->input('update_country');

            $sucess= $res->save();
            
            return redirect('/fetchuser')->with('sucess', 'Update Success');
            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Update Unsccessfull');

          }

    }



//  save    city    ---------------------------  



    public function citys()
    {
        return view('Admin.allcity')->with('citys',City::all());
        
    }
    public function deletecity(Request $request) {    
        $deleteid=$request->id;
        
        $City = City::find($deleteid); 
        $member= $City->delete($deleteid);
        if($member){
            return redirect('/city')->with('sucess', 'delete City');
          }else{
            echo "0";
          }
    }
    public function addcitys() {    
        return view('Admin.addcity');
    }
    public function savecity(Request $request) {        
        $res=new City;
        try { 
            $citys= City::Where('name','=',$request->input('City_name'))->first();
            if($citys==""){
            $res->name=$request->input('City_name');
        
            $sucess= $res->save();
            return redirect('city')->with('sucess', ' Add Success' );
         }else{
            return redirect()->back()->with('error', 'Already Save City' );

         }
            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', ' City Already Save');

          } 
    }
    public function editcity($id) {   
    
         
        $res=new City;
        return view('Admin.editcity')->with('editcity',City::find($id));

    }
    
    public function editcitysave(Request $request) {   
    
         
        $res=City::find($request->id);
        try { 
            $res->name=$request->input('Editcityname');
        
            $sucess= $res->save();
            return redirect('/city')->with('sucess', 'Update Success' );
            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', ' Edit is not Success');

          } 

    }



//  save state ----------------



        public function state()
        {
            return view('Admin.Allstate')->with('state',State::all());
            
        }
        
        public function deletestate(Request $request)
        {
            $deleteid=$request->id;
        
            $state = State::find($deleteid); 
            $state= $state->delete($deleteid);
            if($state){
                return redirect('/state')->with('Deletestate', 'Delete State');
              }else{
                echo "0";
              }
            
        }
        public function editstate($id)
        {
            $res=new State;
            return view('Admin.editstate')->with('editstate',State::find($id));
            
        }
        public function editstatesave(Request $request) {   
    
         
            $res=State::find($request->id);
            try { 
                
                $res->name=$request->input('Editstatename');
                $sucess= $res->save();
                return redirect('/state')->with('Editstatename', 'Success' );
                
              } catch(\Illuminate\Database\QueryException $ex){ 
                return redirect()->back()->with('Editstatename', ' Edit is not Success');
    
              } 
    
        }
        public function addstate() {    
            return view('Admin.Addstate');
        }
        public function addstatesave(Request $request) {   
    
         
            $res=new State;
            try { 
                $state= State::Where('name','=',$request->input('State_name'))->first();
                if($state==""){
                $res->name=$request->input('State_name');
            
                $sucess= $res->save();
                return redirect('/state')->with('addstateyname', 'Success' );
                }else{
                    return redirect()->back()->with('addstatenameerror', ' Already Save State');

                }

              } catch(\Illuminate\Database\QueryException $ex){ 
                return redirect()->back()->with('addstatenameerror', ' Edit is not Success');
    
              } 
    
        }

 // country--------------------------------------------------
      public function country()
        {
            return view('Admin.Allcountry')->with('countrys',Country::all());
            
        }
        public function deletecountry(Request $request)
        {
            $deleteid=$request->id;
        
            $counrty = Country::find($deleteid); 
            $counrty= $counrty->delete($deleteid);
            if($counrty){
                return redirect('/country')->with('Deletescounrty', 'Delete Country');
              }else{
                echo "0";
              }
            
        }
        public function editcountry($id)
        {
            $res=new State;
            return view('Admin.editcountry')->with('editcountrys',Country::find($id));
            
        }
        
        public function editcountrysave(Request $request) {   
    
         
            $res=Country::find($request->id);
            try { 
                $res->name=$request->input('EditCoutryname');
                $sucess= $res->save();
                return redirect('/country')->with('EditCoutryname', 'Success' );
                
              } catch(\Illuminate\Database\QueryException $ex){ 
                return redirect()->back()->with('EditCoutrynameerror', ' Edit is not Success');
    
              } 
    
        }
        public function addcountry() {    
            return view('Admin.Addcountry');
        }
        
        public function savecountry(Request $request) {   
    
         
            $res=new Country;
            try { 
                $Country= Country::Where('name','=',$request->input('counrty_name'))->first();
                if($Country==""){
                $res->name=$request->input('counrty_name');
            
                $sucess= $res->save();
                return redirect('/country')->with('addcountryname', 'Success' );
                }else{
                    return redirect()->back()->with('addcountrynameerror', 'Aready Save');

                }

              } catch(\Illuminate\Database\QueryException $ex){ 
                return redirect()->back()->with('addcountrynameerror', ' Unsuccessfull');
    
              } 
    
        }
}
