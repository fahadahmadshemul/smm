<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //index
    public function index(){
        $collection = User::with('country')->where('role_id', '!=', 0)->orderBy('id', 'desc')->paginate(20);
        return view('admin.user.all_user', compact('collection'));
    }
    //change_password
    public function change_password($id){
        $id = $id;
        return view('admin.user.change_user_password', compact('id'));
    }
    //update_password
    public function update_password(Request $request,$id){
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $update = User::findOrFail($id);
        $update->password = Hash::make($request->password);
        $update->save();
        $notification = array('message'=> 'Update User Password Successfully...!', 'alert-type'=>'info');
        return redirect()->route('all-user')->with($notification);
    }
    //active
    public function active($id){
        $user = User::findOrFail($id);
        $user->status = 1;
        $user->save();
        $notification = array('message'=> 'Active User Successfully...!', 'alert-type'=>'success');
        return redirect()->route('all-user')->with($notification);
    }
    //active
    public function block($id){
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();
        $notification = array('message'=> 'Block User Successfully...!', 'alert-type'=>'error');
        return redirect()->route('all-user')->with($notification);
    }
    //verify 
    public function verify (){
        return view('general_user.verify');
    }
    //verified
    public function verified(Request $request){
        
        $request->validate([
            'verify_card'=>'required',
            'name'=>'required',
            'card_number'=>'required',
            'front_image'=>'required',
            'back_image'=>'required',
            'real_image'=>'required',
        ]);
        $user_id = Auth::user()->id;

        $verify = User::findOrFail($user_id);
        $verify->verify_card = $request->verify_card;
        $verify->name = $request->name;
        $verify->card_number = $request->card_number;

        $front_image = $request->file('front_image');
        $back_image = $request->file('back_image');
        $real_image = $request->file('real_image');

        if($front_image){
            $image_name = md5(now());
            $ext = strtolower($front_image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/uploads/user/front_image/';
            $image_url = $upload_path.$image_full_name;
            $front_image->move($upload_path, $image_full_name);
            $verify->front_image = $image_url;
        }
        if($back_image){
            $image_name = md5(now());
            $ext = strtolower($back_image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/uploads/user/back_image/';
            $image_url = $upload_path.$image_full_name;
            $back_image->move($upload_path, $image_full_name);
            $verify->back_image = $image_url;
        }
        if($real_image){
            $image_name = md5(now());
            $ext = strtolower($real_image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/uploads/user/real_image/';
            $image_url = $upload_path.$image_full_name;
            $real_image->move($upload_path, $image_full_name);
            $verify->real_image = $image_url;
        }
        $verify->is_verified = 1;
        $verify->save();
        $notification = array('message'=>'Verify User Successfully...!', 'alert-type'=>'success');
        return redirect()->route('admin')->with($notification);
    }

    //change_password
    public function change_my_password(){
        return view('admin.user.change_my_password');
    }
    //update_password
    public function update_my_password(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $update = User::findOrFail(Auth::user()->id);
        $update->password = Hash::make($request->password);
        $update->save();
        $notification = array('message'=> 'Change Password Successfully...!', 'alert-type'=>'info');
        return back()->with($notification);
    }
}
