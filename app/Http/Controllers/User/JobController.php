<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;
use App\Models\SubLocation;

class JobController extends Controller
{
    //index
    public function index(){
        $locations = Location::get();
        return view('general_user.post_job', compact('locations'));
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
}
