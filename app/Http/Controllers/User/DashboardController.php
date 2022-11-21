<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    
    public function __construct()
    {
        $this->middleware(['verified']);
    }



    public function index()
    {
        return view('User.Home');
    }
}
