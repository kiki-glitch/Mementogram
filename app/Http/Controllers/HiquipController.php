<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
use Session;

class HiquipController extends Controller
{
    public function hiquipview(){


        return view('hiquip.hiquipview');
    }
     public function hiquipview_product(){


        return view('hiquip.hiquipview_product');
    } 
}
