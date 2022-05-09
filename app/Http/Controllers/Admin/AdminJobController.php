<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class AdminJobController extends Controller
{
    //all-job
    public function all_job(){
        $collection = Job::orderBy('id', 'desc')->paginate(20);
        return view('admin.job.all_job', compact('collection'));
    }
    //pending_job
    public function pending_job(){
        $collection = Job::orderBy('id', 'desc')->where('job_status', 0)->paginate(20);
        return view('admin.job.pending_job', compact('collection'));
    }
    //pending_job
    public function approved_job(){
        $collection = Job::orderBy('id', 'desc')->where('job_status', 1)->paginate(20);
        return view('admin.job.approve_job', compact('collection'));
    }
    //pending_job
    public function paused_job(){
        $collection = Job::orderBy('id', 'desc')->where('job_status', 2)->paginate(20);
        return view('admin.job.pause_job', compact('collection'));
    }
    //completed_job
    public function completed_job(){
        $collection = Job::orderBy('id', 'desc')->where('job_status', 3)->paginate(20);
        return view('admin.job.complete_job', compact('collection'));
    }
    //approve_job
    public function approve_job($id){
        $save = Job::findOrFail($id);
        $save->job_status = 1;
        $save->save();
        $notification = array('message'=>'Approved Job Successfully...!', 'alert-type'=>'success');
        return back()->with($notification);
    }
    //pause_job
    public function pause_job($id){
        $save = Job::findOrFail($id);
        $save->job_status = 2;
        $save->save();
        $notification = array('message'=>'Pause Job Successfully...!', 'alert-type'=>'error');
        return back()->with($notification);
    }
}
