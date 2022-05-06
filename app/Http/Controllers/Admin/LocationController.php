<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\SubLocation;

class LocationController extends Controller
{
    //index
    public function index(){
        $locations = Location::orderBy('id', 'desc')->get();
        $sub_locations = SubLocation::with('location')->orderBy('id', 'desc')->get();
        return view('admin.location.location', compact('locations', 'sub_locations'));
    }
    //save_location
    public function save_location(Request $request){
        $request->validate([
            'location_name'=>'required'
        ]);
        $save = new Location;
        $save->location_name = $request->location_name;
        $save->location_slug = \Str::slug($request->location_name);
        $save->save();
        $notification = array('message'=>'Create Location Successfully....!', 'alert-type'=>'success');
        return back()->with($notification);
    }
    //edit_location
    public function edit_location($id){
        $result = Location::findOrFail($id);
        return $result;
    }
    //update_location
    public function update_location(Request $request){
        $request->validate([
            'id'=>'required',
            'location_name'=>'required',
        ]);
        $update = Location::findOrFail($request->id);
        $update->location_name = $request->location_name;
        $update->location_name = \Str::slug($request->location_name);
        $update->save();
        $notification = array('message'=>'Update Location Successfully....!', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //delete_location
    public function delete_location($id){
        $result = Location::findOrFail($id);
        $sub_locations = SubLocation::where('location_id', $id)->get();
        foreach ($sub_locations as $value) {
            $value->delete();
        }
        $result->delete();
        $notification = array('message'=>'Delete Location Successfully....!', 'alert-type'=>'error');
        return back()->with($notification);
    }
    //save_sub_location
    public function save_sub_location(Request $request){
        $save = new SubLocation;
        $save->sub_location_name = $request->sub_location_name;
        $save->location_id = $request->main_location;
        $save->save();
        $notification = array('message'=>'Create Sub Location Successfully....!', 'alert-type'=>'success');
        return back()->with($notification);
    }
    //edit_sub_location
    public function edit_sub_location($id){
        $result = SubLocation::findOrFail($id);
        return $result;
    }
    //update_sub_location
    public function update_sub_location(Request $request){
        $request->validate([
            'id'=>'required',
            'sub_location_name'=>'required',
        ]);
        $update = SubLocation::findOrFail($request->id);
        $update->sub_location_name = $request->sub_location_name;
        $update->save();
        $notification = array('message'=>'Update Sub Location Successfully....!', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //delete_sub_location
    public function delete_sub_location($id){
        $result = SubLocation::findOrFail($id);
        $result->delete();
        $notification = array('message'=>'Delete Sub Location Successfully....!', 'alert-type'=>'error');
        return back()->with($notification);
    }
}
