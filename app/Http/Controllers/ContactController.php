<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Portfolio;
use App\Models\SocialLinks;
use App\Models\Enquiry;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Image;
use File;
use Session;
use DB;
use Validate;
use Redirect;

class ContactController extends Controller
{
     public function __construct()
    {
        $this->middleware(['auth']);
 
    }
    public function contact_form($id){

        $users = User::find($id);
        return view('contact.contact_form',['users'=>$users]);
    }
    public function contact_form_save(Request $request ){

        //validation

        $data = $this->validate($request,
            ['name'=> 'required|max:255',
            'sender_id'=> 'required', 
            'recepient_id'=>'required',
            'recepient_email'=>'required',
              'email'=> 'required|email|max:255',
              'phone'=>'required|regex:/(07)[0-9]{8}/',
              'subject'=>'required',
              'form_message'=>'required',
            ]);
        
        $enquiry = new Enquiry();

        $enquiry->Sender_name =$request->name;
        $enquiry->sender_id = $request->sender_id;
        $enquiry->recepient_id =$request->recepient_id;
        $enquiry->sender_email =$request->email;
        $enquiry->recepient_email =$request->recepient_email;
        $enquiry->phone_number =$request->phone;
        $enquiry->subject = $request->subject;
        $enquiry->message = $request->form_message;

        if($enquiry->save() == true){
            $recepient_email = $request->recepient_email;

            Mail::to($request->recepient_email)->send(new ContactMail($data));
            Session::flash('msg','Contant successful');
            return Redirect::back();
        }else{
            echo "Error";
            return back();
        }
        
        // dd($request);
    }
}
