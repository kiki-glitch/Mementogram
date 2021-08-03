<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
 
    }
    public function index(){

        $user = auth()->user();
        
        return view('dashboard');
    }
    public function userportfolio(){
        
        return view('user.portfolio',array('user' => Auth::user()) );
    }
}
