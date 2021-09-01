<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        //validation
        $this->validate($request,
            ['first_name'=> 'required|max:255',
            'last_name'=> 'required|max:255', 
             'username'=> 'required|max:255',
              'email'=> 'required|email|unique:users|max:255',
              'password'=> 'required|confirmed',
              'role_id'=>'required'

            ]);     
        //store user
       $user = User::create([
            'First_name'=> $request->first_name,
            'Last_name'=> $request->last_name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

       $user->attachRole($request->role_id);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('dashboard');
        //sign user in

        

        //redirect
    }
    
}
