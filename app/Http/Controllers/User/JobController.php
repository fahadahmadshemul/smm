<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;
use App\Models\SubLocation;
use App\Models\SubCategory;
use App\Models\Advertisement;
use App\Models\Job;
use App\Models\User;
use Auth;

class JobController extends Controller
{
    //index
    public function index(){
        $locations = Location::get();
        $sub_locations = SubLocation::get();
        $categories = Category::orderBy('id', 'asc')->get();
        $category = Category::orderBy('id', 'asc')->first();
        $sub_categories = SubCategory::where('category_id', $category->id)->get();
        return view('general_user.job.post_job', compact('locations', 'sub_locations', 'categories', 'sub_categories'));
    }
    //get_sub_location
    public function get_sub_location($id){
        if($id == 'international'){
            $result = SubLocation::get();
            return $result;
        }else{
            $result = SubLocation::where('location_id', $id)->get();
            return $result;
        }
    }
    //get_sub_category
    public function get_sub_category($id){
        $result = SubCategory::where('category_id', $id)->get();
        return $result;
    }
    //get_user_amount
    public function get_user_amount(){
        $amount = Auth::user()->deposit_balance;
        $amount = (float)$amount;
        return $amount;
    }
    //save_job
    public function save_job(Request $request){
        
        $request->validate([
            'location'=>'required',
            'category'=>'required',
            'sub_category'=>'required',
            'job_title'=>'required',
            'thumbnail_image'=>'required',
            'worker_need'=>'required',
            'each_worker_earn'=>'required',
            'require_screenshot'=>'required',
            'estimated_day'=>'required',
            'total_spend'=>'required',
        ]);
        $amount = Auth::user()->deposit_balance;
        $amount = (float)$amount;
        if($amount > $request->total_spend){
            $save = new Job;
            $save->user_id = Auth::user()->id;
            $save->job_id = uniqid();
            $save->location_id = $request->location;
            //looping 
            $sub_location_id = $request->sub_location;
            if($sub_location_id){
                $sub_location_array = array();
                foreach($sub_location_id as $s_l_id){
                    $sub_location_array[] = $s_l_id;
                }
                $sub_location_id = implode('|', $sub_location_array);
                $save->sub_location_id = $sub_location_id;
            }
            //end of looping

            $save->category_id = $request->category;
            $save->sub_category_id = $request->sub_category;
            $save->job_title = $request->job_title;

            //looping
            $workSteps = $request->workSteps;
            $workStep_array = array();
            if($workSteps){
                foreach($workSteps as $workStep){
                    $workStep_array[] = $workStep;
                }
                $workSteps = implode('&#&', $workStep_array);
                $save->workSteps = $workSteps;
            }
            //end looping
            $save->task_proof = $request->task_proof;

            //image 
            $thumbnail_image = $request->file('thumbnail_image');
            if($thumbnail_image){
                $image_name = md5(now());
                $ext = strtolower($thumbnail_image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/uploads/post_job/';
                $image_url = $upload_path.$image_full_name;
                $thumbnail_image->move($upload_path, $image_full_name);
                $save->thumbnail_image = $image_url;
            }
            //end image

            $save->worker_need = $request->worker_need;
            $save->each_worker_earn = $request->each_worker_earn;
            $save->require_screenshot = $request->require_screenshot;
            $save->estimated_day = $request->estimated_day;
            $save->total_spend = $request->total_spend;
            $save->save();

            $user = User::findOrFail(Auth::user()->id);
            $user->deposit_balance = $user->deposit_balance - $request->total_spend;
            $user->save();

            $notification = array('message'=>'Post Job Successfully.!Please Wait for Admin Approve', 'alert-type'=>'success');
            return back()->with($notification);
        }else{
            $notification = array('message'=>'you have insufficient blance to post this job..please deposit now', 'alert-type'=>'error');
            return redirect()->route('manual-deposit')->with($notification);
        }
    }
    //my_job
    public function my_job(){
        $id = Auth::user()->id;
        $collection = Job::where('user_id', $id)->orderBy('id', 'desc')->get();
        return view('general_user.job.my_job', compact('collection'));
    }
    //my_job_details
    public function my_job_details($id){
        $id = base64_decode($id);
        $content = Job::with('location', 'category')->findOrFail($id);
        return view('general_user.job.my_job_details', compact('content'));
    }
    //pause_user_job
    public function pause_user_job($id){
        $update = Job::findOrFail($id);
        $update->job_status = 2;
        $update->save();
        $notification = array('message'=>'Pause Job Successfully..!', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //resume_user_job
    public function resume_user_job($id){
        $update = Job::findOrFail($id);
        $update->job_status = 1;
        $update->save();
        $notification = array('message'=>'Resume Job Successfully..!', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //find_job
    public function find_job(){
        $ads = Advertisement::where('status', 1)
                    ->whereDate('ad_start', '<=', date("Y-m-d"))
                    ->whereDate('ad_end', '>=', date("Y-m-d"))
                    ->inRandomOrder()
                    ->limit(1)
                    ->get();
        $my_id = Auth::user()->id;
        $collection = Job::orderBy('id', 'desc')->where('job_status', 1)->where('user_id', '!=', $my_id)->paginate(15);
        return view('general_user.job.find_job', compact('collection', 'ads'));
    }
    //job
    public function job($id){
        $id = base64_decode($id);
        $content = Job::with('location', 'category', 'user')->findOrFail($id);
        return view('general_user.job.job_details', compact('content'));
    }
    //job_proves
    public function job_proves($id){
        $id = base64_decode($id);
        $job = Job::with('proves')->where('id', $id)->first();
        return view('general_user.job.job_prove', compact('job'));
    }
}
