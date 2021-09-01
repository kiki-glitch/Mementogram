<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Portfolio;
use App\Models\Products;
use App\Models\SocialLinks;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
//use Illuminate\Support\Facades\DB;
use Session;
use DB;


class AdminControleer extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','role:admin']);
 
    }

   public function user_view(){

        $user = Auth::user();
        //$users = User::withoutTrashed()->paginate(5);
        $trashes = User::onlyTrashed()->paginate(5);
        $users = User::whereHas('roles', 
            function($q){
            $q->whereIn('name', ['user'])->orWhereIn('name', ['brand']);
        })->withoutTrashed()->paginate(5);
        return view('admin.admin_userview2',['users'=>$users])->withUser($user)->with(['trashes'=>$trashes]);
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
    public function hiquip_view(){

        $user = Auth::user();
        //$products = Proucts::withTrashed()->paginate(5);
        $products = Products::withTrashed()->paginate(5);
        $trashes = Products::paginate(5);
        return view('admin.hiquipview',['products'=>$products],['trashes'=>$trashes])->withUser($user);
    }

    public function addproduct_view(){

        $user = Auth::user();
        $products = Products::all();
        return view('admin.add_hiquip')->withUser($user)->with(['products'=>$products]);
    }
    public function addproduct(Request $request){

        $this->validate($request,
            ['product_name'=> 'required|max:255',
            'category'=> 'required|max:255', 
            'product_img'=>'required',
             'description'=> 'required',
              'price'=> 'required|integer', 

            ]); 

        //$newImageName = time() .  '.' . $request->product_img->extension();

        //$request->product_img->move(public_path('upload/hiquip/'), $newImageName); 
        

        if($request->hasFile('product_img')){
            $product_img = $request->file('product_img');
            $filename = time() . '.' . $product_img->getClientOriginalExtension();
            Image::make($product_img)->resize(400,400)->save( public_path('/upload/hiquip/' . $filename ) );   
        }
        //store product
       $product = Products::create([
            'product_img'=> $filename,
            'name'=> $request->product_name,
            'category'=> $request->category,
            'description'=> $request->description,
            'price'=> $request->price,
        ]);

        //dd($request);
       Session::flash('success','Product added successfull');
       return redirect()->back();
    
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

    /*Hiquip*/

     public function orderView(){

        $user = Auth::user();
        $orders = Order::paginate(10);
        return view('admin.orderview',['orders'=>$orders])->withUser($user);
    }
    public function orderitemsView(){

        $user = Auth::user();
        $orders = $users = DB::table('order_items')->paginate(10);
        return view('admin.orderitemsView',['orders'=>$orders])->withUser($user);
    }
    public function order_delete($id){

        $orders = Order::findOrFail($id);
        $orders->delete();

        Session::flash('msg','Order Deleted');
        return redirect()->back();
    }

     public function edit_hiquip($id){

        $user = Auth::user();
        $products = Products::findOrFail($id);
        return view('admin.admin_editProduct',['products'=>$products])->withUser($user);
    }
    public function editproduct(Request $request){

        $users = Auth::user();

        $this->validate($request,
            ['product_name'=> 'required|max:255',
            'category'=> 'required|max:255', 
             'description'=> 'required',
              'price'=> 'required|integer', 

            ]); 
        if($request->hasFile('product_img')){
            $product_img = $request->file('product_img');
            $filename = time() . '.' . $product_img->getClientOriginalExtension();
            Image::make($product_img)->resize(400,400)->save( public_path('/upload/hiquip/' . $filename ) );

        }

        $products = Products::findOrFail($request->id);
        
       // $products->product_img= $filename;
        $products->name= $request->product_name;
        $products->category= $request->category;
        $products->description=$request->description;
        $products->price = $request->price;
        $products->save();

        Session::flash('msg','Product updated successfully');
        return redirect()->back();
    }
    public function edit_order($id){

        $user = Auth::user();
        $orders = Order::findOrFail($id);
        return view('admin.editOrder',['orders'=>$orders])->withUser($user);
    }
     public function update_order(Request $request){

        $users = Auth::user();

        $this->validate($request,
            ['id'=> 'required',
            'is_paid'=> 'required', 
             'is_returned'=> 'required',
              'payment_method'=> 'required',
              'status'=>'required', 

            ]); 
        $orders = Order::findOrFail($request->id);
        
       // $products->product_img= $filename;
        $orders->is_returned= $request->is_returned;
        $orders->is_paid= $request->is_paid;
        $orders->payment_method=$request->payment_method;
        $orders->status = $request->status;
        $orders->save();

        Session::flash('msg','Order updated successfully');
        return redirect()->back();
    }
   
     public function restore_hiquip($id){

        $products = Products::withTrashed()->findOrFail($id);
        $products->restore();

        Session::flash('msg','Product successfully Restored');
        return redirect()->back();
    }
    public function disable_hiquip($id){
        $products = Products::findOrFail($id);
        $products->delete();

        Session::flash('msg','Product Disabled');
        return redirect()->back();
    }
    public function delete_hiquip($id){

        $products = Products::onlyTrashed()->findOrFail($id);
        $products->forceDelete();

        Session::flash('msg','Product Permanently Deleted');
        return redirect()->back();
    }
}

