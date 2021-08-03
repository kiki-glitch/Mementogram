<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Portfolio;
use App\Models\SocialLinks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Session;


class PortfolioController extends Controller
{


    public function add(Request $request){

        $this->validate($request,
            [
             'user_id'=>'required',
             'portfolio_file'=> 'required',
             'description'=> 'required' 

            ]);   

        $newImageName = time() .  '.' . $request->portfolio_file->extension();

        $request->portfolio_file->move(public_path('upload/portfolios/'), $newImageName);

        

       /* if($request->hasFile('portfolio_file')){
            $portfolio_file = $request->file('portfolio_file');
            $filename = time() . '.' . $portfolio_file->getClientOriginalExtension();
            Image::make($portfolio_file)->resize(300,300)->save( public_path('/upload/portfolios/' . $filename ) );
            
            $portfolio->media = $filename;
            $portfolio->user_id= $request->user_id;
            $portfolio->description = $request->description;
            $portfolio->save();*/

         $portfolio = Portfolio::create([
            'user_id'=> $request->user_id,
            'media'=> $newImageName,
            'description'=> $request->description,
            
            
        ]);
        $request->session()->flash('success2', 'Your Portfolio has been successfully added!');
         return redirect()->back();

        }
    
    public function socials(Request $request){

        //$regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        $this->validate($request,
            [
             'user_id'=>'required',
             'social_link'=> 'required',
             'url'=> 'required|url',
            // 'url'=> 'required|regex:'.$regex,

            ]);   


        $social_links = SocialLinks::create([
            'user_id'=> $request->user_id,
            'social_media'=> $request->social_link,
            'URL'=> $request->url,
            
            
        ]);

        $request->session()->flash('success3', 'Your Social Platform has been successfully added!');
         return redirect()->back();

    }
    public function portflio_view(){

        $user = Auth::user();

        $portfolios = Portfolio::where('user_id',$user->id)->get();

        return view('user.portfolio_view',['portfolios'=>$portfolios])->withUser($user);

    }
    public function socials_view(){

         $user = Auth::user();
         $socials = SocialLinks::where('user_id',$user->id)->get();
         
         
        return view('user.socials',['socials'=>$socials])->withUser($user);
    }
    public function socials_edit($id){

        $user = Auth::user();
        $socials = SocialLinks::find($id);
        return view('user.editSocials',['socials'=>$socials])->withUser($user);

    }
    public function socials_update(Request $request){

        $user = Auth::user();

        $this->validate($request,
            [
             'social_link'=> 'required',
             'url'=> 'required|url', 

            ]);

        $socials = SocialLinks::find($request->id);
        $socials->social_media=$request->social_link;
        $socials->URL=$request->url;
        $socials->save();


        return redirect()->route('socials.view');
    }
    public function socials_delete($id){

        $socials = SocialLinks::find($id);
        $socials->delete();

        Session::flash('msg','Social Link successfully deleted');
        return redirect()->back();


    }

    public function portflio_edit($id){
        $user = Auth::user();
        $portfolios = Portfolio::find($id);
        return view('user.editPortfolio',['portfolios'=>$portfolios])->withUser($user);
    }
    public function portflio_delete($id){

        $portfolios = Portfolio::find($id);
        $portfolios->delete();

        Session::flash('msg','Portfolio successfully deleted');
        return redirect()->back();
    }
    public function portfolio_update(Request $request){

        $user = Auth::user();

        $this->validate($request,
            [
             'description'=> 'required',
            ]);

        $portfolios = Portfolio::find($request->id);
        $portfolios->description=$request->description;
        $portfolios->save();


        return redirect()->route('portfolio.view');


    }
}
