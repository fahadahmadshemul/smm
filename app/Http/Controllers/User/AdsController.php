<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Notification;
use Auth;
use Carbon\Carbon;

class AdsController extends Controller
{
    //index
    public function index(){
        return view('general_user.ads');
    }
    //save
    public function save(Request $request){
        $request->validate([
            'ads_title'=>'required',
            'target_destination'=>'required',
            'ads_package'=>'required',
            'banner_image'=>'required',
        ]);

        $save = new Advertisement;
        $save->user_id = Auth::user()->id;
        $save->ads_id = uniqid();
        $save->ads_title = $request->ads_title;
        $save->target_destination = $request->target_destination;
        $save->ad_day = $request->ads_package;
        $banner_image = $request->file('banner_image');
        if($banner_image){
            $image_name = md5(now());
            $ext = strtolower($banner_image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/uploads/advertisement/';
            $image_url = $upload_path.$image_full_name;
            $banner_image->move($upload_path, $image_full_name);
            $save->banner_image = $image_url;
        }
        $save->save();
        $notification = array('message'=>'Post Advertisement Successfully.!Please Wait for Admin Approve', 'alert-type'=>'success');
        return back()->with($notification);
    }
    //all
    public function all(){
        $collection = Advertisement::with('user')->orderBy('id', 'desc')->paginate(20);
        return view('admin.ads.all_ads', compact('collection'));
    }
    //pending
    public function pending(){
        $collection = Advertisement::with('user')->where('status', 0)->orderBy('id', 'desc')->paginate(20);
        return view('admin.ads.pending_ads', compact('collection'));
    }
    //approve
    public function approve($id){
        $approve = Advertisement::findOrFail($id);
        $day = $approve->ad_day;
        //##calculate
        $ad_start = Carbon::now();
        $ad_end = Carbon::now()->addDays($day);
        //calculate end
        $approve->ad_start = $ad_start;
        $approve->ad_end = $ad_end;
        $approve->status = 1;
        $approve->save();

        //notification
        $notify = new Notification;
        $notify->user_id = $approve->user_id;
        $notify->title = 'Advertisement Approved';
        $notify->description = 'Your Advertisement Title: '.$approve->ads_title.' is successfully approved..!';
        $notify->save();

        $notification = array('message'=>'Approved Advertisement Successfully...!', 'alert-type'=>'info');
        return back()->with($notification);
        
    }
    
}
