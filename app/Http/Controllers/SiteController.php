<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubLocation;
use App\Models\User;
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
        $save->save();
        Session::put('signup_success', 'Account Create Success. Login to your account');
        return back();
    }
}
