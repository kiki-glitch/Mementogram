<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Portfolio;
use App\Models\SocialLinks;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
use Session;
use DB;

class PortfolioHubController extends Controller
{
    
    public function userportfolio(){

        
       //$users = User::hasRole('user')->get();
       // $users = User::with('role_user')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_user.id', '2')->get();
        $users = User::whereHas('roles', function($q){$q->whereIn('name', ['user']);})->get();
        return view('portfoliohub.portfoliohub',['users'=>$users]);
    }
    public function portfoliohub_view($id){

        $users = User::find($id);
        $portfolios = Portfolio::where('user_id', '=', $id)->get();
        return view('portfoliohub.portfoliohub_view',['users'=>$users],['portfolios'=>$portfolios]);
    }
}
