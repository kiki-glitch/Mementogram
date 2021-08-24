<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact_form(){

        return view('contact.contact_form');
    }
}
