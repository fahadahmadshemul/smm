<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;
use App\Models\SubLocation;
use App\Models\SubCategory;
use App\Models\Job;
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
        return view('general_user.post_job', compact('locations', 'sub_locations', 'categories', 'sub_categories'));
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
        $notification = array('message'=>'Post Job Successfully.!Please Wait for Admin Approve', 'alert-type'=>'success');
        return back()->with($notification);
    }
}
