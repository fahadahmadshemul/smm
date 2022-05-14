<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubLocation;
use App\Models\User;
use App\Models\Page;
use App\Models\TopRefer;
use App\Models\JobPoster;
use Illuminate\Support\Facades\Hash;
use Session;


class SiteController extends Controller
{
    //index
    public function index(){
        return view('welcome');
    }
    //login
    public function login(){
        return view('frontend.login');
    }
    //support
    public function support(){
        return view('frontend.support');
    }
    //login
    public function register(){
        $sub_locations = SubLocation::get();
        return view('frontend.register', compact('sub_locations'));
    }
    //save_register
    public function save_register(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6',
            'country'=>'required',
            'phone'=>'required',
        ]);
        
        $save = new User;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->country_id = $request->country;
        $save->phone = $request->phone;
        $save->password = Hash::make($request->password);
        $refer_id = Session::get('refer_id');
        if($refer_id){
            $save->refer_id = $refer_id;
            $top_refer = TopRefer::where('user_id', $refer_id)->first();
            if($top_refer){
                $top_refer->joined = $top_refer->joined + 1;
                $top_refer->save();
            }else{
                $top_refer = new TopRefer;
                $top_refer->user_id = $refer_id;
                $top_refer->joined = 1;
                $top_refer->save();
            }
        }
        Session::put('refer_id', NULL);
        $save->save();
        Session::put('signup_success', 'Account Create Success. Login to your account');
        return back();
    }

    //page
    public function page($page_slug){
        $content = Page::where('page_slug', $page_slug)->first();
        return view('page', compact('content'));
    }

    //refer
    public function refer($id){
        $id = base64_decode($id);
        Session::put('refer_id', $id);
        return view('welcome');
    }
    //refer_now
    public function refer_now(){
        $user_id = \Auth::user()->id;
        $refer_count = User::where('refer_id', $user_id)->get()->count();
        return view('general_user.top.refer', compact('refer_count'));
    }
    //top_refer
    public function top_refer(){
        $collection = TopRefer::with('user')->orderBy('joined', 'desc')->limit(20)->get();
        return view('general_user.top.top_refer', compact('collection'));
    }
    //top_job_poster
    public function top_job_poster(){
        $collection = JobPoster::with('user')->orderBy('total_job_post', 'desc')->limit(20)->get();
        return view('general_user.top.top_job_poster', compact('collection'));
    }
}
