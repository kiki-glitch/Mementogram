<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Intervention\Image\Facades\Image;
//use Illuminate\Support\Facades\File
use Image;
use File;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
 
    }
    public function edit(){

        if(Auth::user()){
            $user = User::find(Auth::user()->id);

            if($user){


            return view('user.edit')->withUser($user);
        }else{  
            return redirect()->back();
        }
    }else{
        return redirect()->back();
    }

    }

    public function update(Request $request){

        $user = User::find(Auth::user()->id);

        if($user){

            $validate = null;

            if (Auth::user()->email === $request['email']) {

                $validate = $request->validate([
               'first_name' => 'required|max:255',
               'last_name' => 'required|max:255',
               'username' => 'required|max:255',
                'email'=> 'required|email'
            ]);
            }else{

                $validate = $request->validate([
               'first_name' => 'required|max:255',
               'last_name' => 'required|max:255',
               'username' => 'required|max:255',
                'email'=> 'required|email|unique:users'
            ]);

                /* $this->validate($request,
            ['first_name'=> 'required|max:255',
            'last_name'=> 'required|max:255', 
             'username'=> 'required|max:255',
              'email'=> 'required|email|unique:users'

            ]); */
 

            }

            if ($validate){ 

            $user->First_name = $request['first_name'];
            $user->Last_name = $request['last_name'];
            $user->username = $request['username'];
            $user->email = $request['email'];

            $user->save();

            $request->session()->flash('success', 'Your details have now been updated!');
            return redirect()->back();
        }else{
            return redirect->back();
        }

        }else{
            return redirect->back();
        }
    }

    public function passwordEdit(){

         if(Auth::user()){
            
         return view('user.passwordChange');
        
        }else{
            return redirect()->back();
        }
    }

    public function passwordUpdate(Request $request){

         $validate = $request->validate([
               'o_password' => 'required|min:8',
               'password' => 'required|min:8|required_with:password_confirmation',

            ]);

        $user = User::find(Auth::user()->id);

        if($user) {
            if(Hash::check($request['o_password'], $user->password) && $validate){
                $user->password = Hash::make($request['password']);

                $user->save();

                $request->session()->flash('success', 'Passsword updated !');
                  return redirect()->back();
            }else{
                 $request->session()->flash('error', 'Entered Password does not match current passsword!');
                  return redirect()->route('password.edit');
            }
        }

    }
    public function profile(){
        return view('user.userprofile',array('user' => Auth::user()) );
    }
    public function update_avatar(Request $request){

        $user = User::find(Auth::user()->id);

        // Handle the user upload of avatar
       /* if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->GetClientOriginalExtension();

            // Delete current image before uploading new image
            if ($user->avatar !== 'default.png') {
                // $file = public_path('uploads/avatars/' . $user->avatar);
                $file = '/upload/avatars/' . $user->avatar;
                //$destinationPath = 'uploads/' . $id . '/';

                if (File::exists($file)) {
                    unlink($file);
                }

            }
            // Image::make($avatar)>resize(300, 300)>save(public_path('uploads/avatars/' . $filename));
            Image::make($avatar)->resize(300, 300)->save('upload/avatars/' . $filename);
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }


        return view('user.edit', compact('user'));*/

    
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/upload/avatars/' . $filename ) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('user.userprofile', array('user' => Auth::user()) );

    }

    /*public function editPortfolio(){
          if(Auth::user()){
            
         return view('user.passwordChange');
        
        }else{
            return redirect()->back();
        }
    }*/
    public function userportfolio(){

        $user = Auth::user();
        return view('user.portfolio')->withUser($user);

    }
    public function description_update(Request $request){

        $user = User::find(Auth::user()->id);

        if($user){

            $validate = null;

                $validate = $request->validate([
               'about_me' => 'required|max:255',
               'location' => 'required|max:255',
               'industry' => 'required|max:255',
                
            ]);
            

            if ($validate){ 

            $user->about_me = $request['about_me'];
            $user->location = $request['location'];
            $user->industry= $request['industry'];       

            $user->save();

            $request->session()->flash('success', 'Your details have now been updated!');
            return redirect()->back();
        }else{
            return redirect->back();
        }

        }else{
            return redirect->back();
        }
    }

    
}
