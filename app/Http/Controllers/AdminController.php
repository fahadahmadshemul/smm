<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    //index
    public function index(){
        $verified_user = User::where('is_verified', 1)->get()->count();
        $user_role_id = Auth::user()->role_id;
        if(Auth::user()->status == 0){
            return redirect()->route('logout');
        }else{
            if($user_role_id == 0){
                return view('admin.index', compact('verified_user'));
            }else{
                return view('general_user.index');
            }
        }
    }
}
