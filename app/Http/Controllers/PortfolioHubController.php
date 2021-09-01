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
         $socials = SocialLinks::where('user_id', '=', $id)->get();
        return view('portfoliohub.portfoliohub_view',['users'=>$users],['portfolios'=>$portfolios])->with(['socials'=>$socials]);
    }

    public function search_user(){

        $search_text = $_GET['query'];

       /* $users = User::where('username','LIKE','%'.$search_text.'%')->get();
        if( $users == null){
            Session::flash('msg', 'No User under that name!');
            return redirect()->route('portfoliohub');
        // return view('portfoliohub.search.search_user',compact('users'));
        }
        else{
            Session::flash('msg', 'No User under that name!');
            return redirect()->route('portfoliohub');
        }*/
            
             if($search_text){

               $users = User::where('username','LIKE','%'.$search_text. '%')->get();
            }else{

                $users = User::whereHas('roles', function($q){$q->whereIn('name', ['user']);})->get();
            }
          //  return view('portfoliohub.search.search_user',compact('users'));
            return view('portfoliohub.portfoliohub')->with(['users'=>$users]);
        }
    
    public function searchby_location(){
        
        $search_text = request()->query('location_query');
        if($search_text){

           $users = User::where('industry','LIKE','%'.$search_text. '%')->get();
        }else{

            $users = User::whereHas('roles', function($q){$q->whereIn('name', ['user']);})->get();
        }

        return view('portfoliohub.search.searchby_location',compact('users'));
    }
    
    public function industry_sports(){
       
         $users = User::whereHas('roles', function($q){$q->whereIn('industry', ['Sports']);})->get();
        return view('portfoliohub.portfoliohub',['users'=>$users]);
    }
    public function industry_clothes(){
       
         $users = User::whereHas('roles', function($q){$q->whereIn('industry', ['Clothes']);})->get();
        return view('portfoliohub.portfoliohub',['users'=>$users]);
    }
    public function industry_cars(){
       
         $users = User::whereHas('roles', function($q){$q->whereIn('industry', ['Cars']);})->get();
        return view('portfoliohub.portfoliohub',['users'=>$users]);
    }
    public function industry_music(){
       
         $users = User::whereHas('roles', function($q){$q->whereIn('industry', ['Music']);})->get();
        return view('portfoliohub.portfoliohub',['users'=>$users]);
    }
}

