<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Products;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
 
    }
    public function index(){

       $user = auth()->user();
        
        if(Auth::user()->hasRole('user'))
        {
        return view('dashboard')->withUser('user');
        }
        elseif(Auth::user()->hasRole('admin')){
            $users = User::count();
            //$orders = Order::sum('grand_total');
           //$orders = Order::where('is_paid', '1')->sum('grand_total');
            $orders = Order::where('is_paid', '1');
    
            return view('admin.admin',compact('users'))->with(['orders'=> $orders]);
        }
        else{
            return view('dashboard');
        }
    }
    public function userportfolio(){
        
        return view('user.portfolio',array('user' => Auth::user()) );
    }
}
