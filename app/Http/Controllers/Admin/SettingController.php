<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    //setting
    public function setting(){
        $setting = Setting::findOrFail(1);
        return view('admin.setting', compact('setting'));
    }
    //setting_update
    public function setting_update(Request $request){
        $update = Setting::findOrFail(1);
        $update->website_title = $request->website_title;
        $update->website_desc = $request->website_desc;
        $update->meta_title = $request->meta_title;
        $update->meta_desc = $request->meta_desc;
        $update->facebook = $request->facebook;
        $update->youtube = $request->youtube;
        $logo = $request->file('logo');
        $favicon = $request->file('favicon');

        if($logo){
            $image_name = md5(now());
            $ext = strtolower($logo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/uploads/setting/';
            $image_url = $upload_path.$image_full_name;
            $logo->move($upload_path, $image_full_name);
            $update->logo = $image_url;
        }
        if($favicon){
            $image_name = md5(now());
            $ext = strtolower($favicon->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/uploads/setting/';
            $image_url = $upload_path.$image_full_name;
            $favicon->move($upload_path, $image_full_name);
            $update->favicon = $image_url;
        }
        $update->save();
        $notification = array('message'=>'Update Setting Successfully...!', 'alert-type'=>'info');
        return back()->with($notification);
    }
}
