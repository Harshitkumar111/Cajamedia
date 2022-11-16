<?php

namespace App\Http\Controllers\User;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Hash;

class socialauthcontroller extends Controller
{
    public function githubredirect(Request $request)
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubcallaback(Request $request)
    {
        $userdata = Socialite::driver('github')->user(); 

        $user = User::where('email', $userdata->email)->first();
        if($user){
            Auth::login($user);
            return redirect('/user');
        }else{
            $uuid = Str::uuid()->toString();
            $user =new User();
            $user->first_name =$userdata->name;
            $user->email  =$userdata->email;
            // $user->user_type  ='0';
            $user->password =Hash::make($uuid.now());
            $user->save(); 
                 Auth::login($user);
                return redirect('/user');
       
        }
       
    }
    public function googleredirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }
    public function googlecallaback(Request $request)
    {
        $userdata = Socialite::driver('google')->user(); 
        //check login 
        $user = User::where('email', $userdata->email)->first();
        if($user)
        {
            Auth::login($user);
            return redirect('/user');
        }
        else
        {
             //do register
            $uuid = Str::uuid()->toString();
            $user =new User();
            $user->first_name =$userdata->name;
            $user->email  =$userdata->email;
            $user->password =Hash::make($uuid.now());
            // $user->auth_type ='google';
            $user->save();  
            Auth::login($user);
            return redirect('/user');
        }
       
    }

    public function facebookredirect(Request $request)
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function facebookcallaback(Request $request)
    {
        $userdata = Socialite::driver('facebook')->user(); 
        //check login 
        $user = User::where('email', $userdata->email)->first();
        if($user)
        {
            Auth::login($user);
            return redirect('/user');
        }
        else
        {
             //do register
            $uuid = Str::uuid()->toString();
            $user =new User();
            $user->first_name =$userdata->name;
            $user->email  =$userdata->email;
            $user->password =Hash::make($uuid.now());
            // $user->auth_type ='google';
            $user->save();  
            Auth::login($user);
            return redirect('/user');
        }
       
    }





}

