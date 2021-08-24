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

class PortfolioHubController extends Controller
{
    
    public function userportfolio(){

        $user = Auth::user();
        return view('portfoliohub.portfoliohub')->withUser($user);
    }
    public function portfoliohub_view(){

        $user = Auth::user();
        return view('portfoliohub.portfoliohub_view')->withUser($user);
    }
}
