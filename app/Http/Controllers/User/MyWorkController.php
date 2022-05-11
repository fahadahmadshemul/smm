<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MyWork;
use App\Models\Job;
use Auth;

class MyWorkController extends Controller
{
    //save
    public function save(Request $request, $id){
        $request->validate([
            'work_proof'=>'required',
        ]);

        $job = Job::findOrFail($id);

        $user_id = $job->user_id;
        $worker_id = Auth::user()->id;

        $save = new MyWork;
        $save->user_id = $user_id;
        $save->worker_id = $worker_id;
        $save->job_id = $id;
        $save->work_proof = $request->work_proof;

        $screenshoot = $request->file('screenshoot');
        if($screenshoot){
            $image = array();
            $i = 1;
            foreach($screenshoot as $sc){
                $image_name = md5(now().$i);
                $ext = strtolower($sc->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/uploads/work_proof/';
                $image_url = $upload_path.$image_full_name;
                $sc->move($upload_path, $image_full_name);
                $image[] = $image_url;
                $i++;
            }
            $image = implode('|', $image);
            $save->screenshoot = $image;
        }
        $save->save();
        $notification = array('message'=>'Your Work submited successfully done...please wait for approve', 'alert-type'=>'success');
        return back()->with($notification);
    }
}
