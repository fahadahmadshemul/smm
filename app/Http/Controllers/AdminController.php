<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Job;
use App\Models\Advertisement;
use App\Models\DepositWithdraw;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //index
    public function index(){
        $pending_user = User::where('is_verified', 0)->get()->count();
        $user_role_id = Auth::user()->role_id;
        if(Auth::user()->status == 0){
            return redirect()->route('logout');
        }else{
            if($user_role_id == 0){
                $job = Job::where('job_status', 1)->get()->count();
                $p_jobs = Job::where('job_status', 0)->get()->count();
                $c_jobs = Job::where('job_status', 3)->get()->count();
                $ps_jobs = Job::where('job_status', 2)->get()->count();
                $c_ads = Advertisement::where('status', 1)->get()->count();
                $p_ads = Advertisement::where('status', 0)->get()->count();
                $deposit_withdraw = DepositWithdraw::findOrFail(1);
                return view('admin.index', compact('pending_user', 'job', 'p_jobs', 'c_jobs', 'ps_jobs', 'c_ads', 'p_ads', 'deposit_withdraw'));
            }else{
                $my_id = Auth::user()->id;
                $collection = Job::orderBy('id', 'desc')->where('job_status', 1)->where('user_id', '!=', $my_id)->paginate(15);
                return view('general_user.job.find_job', compact('collection'));
            }
        }
    }
    //change_password
    public function change_password(){
        return view('admin.user.change_password');
    }
    //update_password
    public function update_password(Request $request){
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
