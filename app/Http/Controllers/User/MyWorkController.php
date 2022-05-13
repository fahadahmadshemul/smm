<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MyWork;
use App\Models\Job;
use App\Models\WorkDone;
use App\Models\User;
use App\Models\Review;
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
        $save->task_id = rand(999999, 999999999);
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

        //work done
        $work_done = new WorkDone;
        $work_done->user_id = $worker_id;
        $work_done->job_id = $id;
        $work_done->save();
        //work done end

        $save->save();
        $notification = array('message'=>'Your Work submited successfully done...please wait for approve', 'alert-type'=>'success');
        return redirect()->route('find-job')->with($notification);
    }
    //work
    public function work(){
        $user_id = \Auth::user()->id;
        $collection = MyWork::with('job')->where('worker_id', $user_id)->where('status', 1)->orderBy('id', 'desc')->paginate(20);
        return view('general_user.work.task', compact('collection'));
    }
    //work
    public function work_accepted(){
        $user_id = \Auth::user()->id;
        $collection = MyWork::with('job')->where('worker_id', $user_id)->where('status', 0)->orderBy('id', 'desc')->paginate(20);
        return view('general_user.work.accepted_task', compact('collection'));
    }
    //satisfy_all 
    public function satisfy_all($id){
        //find job
        $job = Job::findOrFail($id);
        $each_worker_earn = $job->each_worker_earn;

        $collection = MyWork::where('job_id', $id)->where('status', 0)->get();
        $count = count($collection);
        if($count > 0){
            foreach ($collection as $item) {
                //add balancet to user wallet
                $worker = User::findOrFail($item->worker_id);
                $worker->earning_balance = $worker->earning_balance+$each_worker_earn;
                //count work done;
                $job->work_done = $job->work_done+1;
                //mywork
                $item->earned = $each_worker_earn;
                $item->status = 1;
                $worker->save();
                $job->save();
                $item->save();
            }
        }
        $notification = array('message'=>'Satisfy Operation Successfully Completed...!', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //get_my_work
    public function get_my_work($id){
        $result = MyWork::findOrfail($id);
        $screenshoot = explode('|', $result->screenshoot);
        $screen = array();
        foreach($screenshoot as $sc){
            $screen[] = \URL::to($sc);
        }
        return $data = [
            'data' => $result,
            'image' => $screen,
        ];
    }
    //save_satisfy
    public function save_satisfy(Request $request){
        $request->validate([
            'my_work_id'=>'required',
            'status'=>'required',
        ]);
        if($request->status == 1){
            $my_work = MyWork::find($request->my_work_id);
            $job = Job::findOrFail($my_work->job_id);

            $each_worker_earn = $job->each_worker_earn;
            $job->work_done = $job->work_done+1;

            $my_work->earned = $each_worker_earn;
            $my_work->status = 1;

            $worker = User::findOrFail($my_work->worker_id);
            $balance = $worker->earning_balance = $worker->earning_balance+$each_worker_earn;

            if($request->rate){
                $rate = new Review;
                $rate->user_id = $my_work->worker_id;
                $rate->job_id = $my_work->job_id;
                $rate->my_work_id = $request->my_work_id;
                $rate->rate = $request->rate;
                $rate->save();
            }

            if($request->tips_amount > 0){
                $murchant = User::findOrFail($job->user_id);
                $murchant->deposit_balance = $murchant->deposit_balance - $request->tips_amount;
                $murchant->save();
                $worker->earning_balance = $balance+$request->tips_amount;
                $my_work->tips = $request->tips_amount;
            }
            $my_work->save();
            $job->save();
            $worker->save();
            $notification = array('message'=>'Satisfy Operation Successfully Completed...!', 'alert-type'=>'info');
            return back()->with($notification);
        }else{
            $my_work = MyWork::find($request->my_work_id);
            $my_work->status = 2;
            $my_work->save();
            $notification = array('message'=>'Unsatisfy Operation Successfully Completed...!', 'alert-type'=>'error');
            return back()->with($notification);
        }
    }
}
