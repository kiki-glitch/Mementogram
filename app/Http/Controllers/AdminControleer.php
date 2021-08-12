<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Portfolio;
use App\Models\SocialLinks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Session;



class AdminControleer extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','role:admin']);
 
    }

   public function user_view(){

        $user = Auth::user();
        $users = User::withoutTrashed()->paginate(5);
        $trashes = User::onlyTrashed()->paginate(5);
        
         
       
        return view('admin.admin_userview2',['users'=>$users],['roles'=>Role::all()])->withUser($user)->with(['trashes'=>$trashes]);
    }

    public function adduser_view(){

        $user = Auth::user();
        $roles = Role::all();
        return view('admin.add_user')->withUser($user)->with(['roles'=>$roles]);
    }
    public function add_user(Request $request){

        $this->validate($request,
            ['first_name'=> 'required|max:255',
            'last_name'=> 'required|max:255', 
             'username'=> 'required|max:255',
              'email'=> 'required|email|unique:users|max:255',
              'password'=> 'required|confirmed' 

            ]);     
        //store user
       $user = User::create([
            'First_name'=> $request->first_name,
            'Last_name'=> $request->last_name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

       //$user->attachRole('user');

       // $user = User::create($request->except(['_token', 'roles']));
        $user->syncRoles($request->roles);
        //$user->roles()->sync($request->roles);

        return redirect()->route('admin_user.view');

        //dd($request);
    }

    public function portfolios_view(){
        
         $user = Auth::user();
         $portfolios = Portfolio::withTrashed()->paginate(5);
         
        return view('admin.admin_portfolioview',['portfolios'=>$portfolios])->withUser($user);
    }
    public function sociallinks_view(){
        
         $user = Auth::user();
         $socials = SocialLinks::withTrashed()->paginate(5);
         
        return view('admin.admin_sociallinksview',['socials'=>$socials])->withUser($user);
    }
    public function passwordEdit($id){

         $user = Auth::user();
         $users = User::findOrFail($id);

         return view('admin.userPasswordReset',['users'=>$users])->withUser($user);
    }

    public function passwordUpdate(Request $request){


        $user = Auth::user();

        $this->validate($request,
            [
             'password' => 'required|min:8|required_with:password_confirmation', 

            ]);

        $users = User::findOrFail($request->id);
        $users->password = Hash::make($request['password']);
        
        $users->save();

        Session::flash('msg','Password Reset successfull');
        return redirect()->back();

    }

     public function user_delete($id){

        $users = User::findOrFail($id);
        $users->delete();

        Session::flash('msg','User successfully Soft Deleted');
        return redirect()->back();
    }
    public function user_restore($id){

        $users = User::withTrashed()->findOrFail($id);
        $users->restore();

        Session::flash('msg','User successfully Restored');
        return redirect()->back();
    }
    public function user_forcedelete($id){

        $users = User::onlyTrashed()->findOrFail($id);
        $users->forceDelete();

        Session::flash('msg','User successfully Permanently Deleted');
        return redirect()->back();
    }

    public function editUserView($id){

        $user = Auth::user();
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.editUser',['users'=>$users])->withUser($user)->with(['roles'=>$roles]);
    }
    public function adminUser_update(Request $request){

        $user = Auth::user();

        $this->validate($request,
            [
             'first_name'=> 'required|max:255',
            'last_name'=> 'required|max:255', 
             'username'=> 'required|max:255',
            //  'email'=> 'required|email|unique:users|max:255',
              'location' => 'required|max:255',
               'industry' => 'required|max:255',  

            ]);

        $users = User::findOrFail($request->id);
        $users->First_name=$request->first_name;
        $users->Last_name=$request->last_name;
        $users->username=$request->username;
        //$users->email=$request->email;
        $users->location=$request->location;
        $users->industry=$request->industry;
        $users->save();

        $users->syncRoles($request->roles);

        return redirect()->route('admin_user.view');
    }
    
    public function edit_useravatar(Request $request){
        $user = Auth::user();
        $users = User::findOrFail($request->id);

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/upload/avatars/' . $filename ) );
            $users->avatar = $filename;
            $users->save();
    }
        return redirect()->back();
    
    }
    public function edit_user_description(Request $request){

        $user = User::findOrFail(Auth::user()->id);
        $users = User::findOrFail($request->id);

        if($user){

            $validate = null;

                $validate = $request->validate([
               'about_me' => 'required|max:255',
                
            ]);
            

            if ($validate){ 

            $users->about_me = $request['about_me'];
                   
            $users->save();

            $request->session()->flash('success', 'Your details have now been updated!');
            return redirect()->back();
        }else{
            return redirect->back();
        }

        }else{
            return redirect->back();
        }
    }


    public function sociallinks_delete($id){
        $socials = SocialLinks::findOrFail($id);
        $socials->delete();

        Session::flash('msg','Social Link successfully Soft Deleted');
        return redirect()->back();
    }
     public function portfolio_delete($id){

        $portfolios = Portfolio::findOrFail($id);
        $portfolios->delete();

        Session::flash('msg','Portfolio successfully Soft Deleted');
        return redirect()->back();
    }
    public function sociallinks_restore($id){

        $socials = SocialLinks::withTrashed()->findOrFail($id);
        $socials->restore();

        Session::flash('msg','Social Link successfully Restored');
        return redirect()->back();
    }
    public function portfolio_restore($id){

        $portfolios = Portfolio::withTrashed()->findOrFail($id);
        $portfolios->restore();

        Session::flash('msg','Portfolio successfully Restored');
        return redirect()->back();
    }
    
    public function portfolios_forcedelete($id){

        $portfolios = Portfolio::onlyTrashed()->findOrFail($id);
        $portfolios->forceDelete();

        Session::flash('msg','Portfolio successfully Permanently Deleted');
        return redirect()->back();
    }
    public function sociallink_forcedelete($id){

        $socials = SocialLinks::onlyTrashed()->findOrFail($id);
        $socials->forceDelete();

        Session::flash('msg','Social Link Permanently Deleted');
        return redirect()->back();
    }
}

