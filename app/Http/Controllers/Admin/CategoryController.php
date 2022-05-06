<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    //index
    public function index(){
        $categories = Category::orderBy('id', 'desc')->get();
        $sub_categories = SubCategory::with('category')->orderBy('id', 'desc')->get();
        return view('admin.category.category', compact('categories', 'sub_categories'));
    }
    //save_category
    public function save_category(Request $request){
        $request->validate([
            'category_name'=>'required'
        ]);
        $save = new Category;
        $save->category_name = $request->category_name;
        $save->save();
        $notification = array('message'=>'Create Category Successfully....!', 'alert-type'=>'success');
        return back()->with($notification);
    }
    //edit_category
    public function edit_category($id){
        $result = Category::findOrFail($id);
        return $result;
    }
    //update_location
    public function update_category(Request $request){
        $request->validate([
            'id'=>'required',
            'category_name'=>'required',
        ]);
        $update = Category::findOrFail($request->id);
        $update->category_name = $request->category_name;
        $update->save();
        $notification = array('message'=>'Update Category Successfully....!', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //delete_location
    public function delete_category ($id){
        $result = Category::findOrFail($id);
        $sub_categories = SubCategory::where('category_id', $id)->get();
        foreach ($sub_categories as $value) {
            $value->delete();
        }
        $result->delete();
        $notification = array('message'=>'Delete Category Successfully....!', 'alert-type'=>'error');
        return back()->with($notification);
    }
    //save_sub_location
    public function save_sub_category (Request $request){
        $save = new SubCategory;
        $save->sub_category_name = $request->sub_category_name;
        $save->category_id = $request->main_category;
        $save->save();
        $notification = array('message'=>'Create Sub Category Successfully....!', 'alert-type'=>'success');
        return back()->with($notification);
    }
    //edit_sub_location
    public function edit_sub_category($id){
        $result = SubCategory::findOrFail($id);
        return $result;
    }
    //update_sub_location
    public function update_sub_category(Request $request){
        $request->validate([
            'id'=>'required',
            'sub_category_name'=>'required',
        ]);
        $update = SubCategory::findOrFail($request->id);
        $update->sub_category_name = $request->sub_category_name;
        $update->save();
        $notification = array('message'=>'Update Sub Category Successfully....!', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //delete_sub_location
    public function delete_sub_category($id){
        $result = SubCategory::findOrFail($id);
        $result->delete();
        $notification = array('message'=>'Delete Sub Category Successfully....!', 'alert-type'=>'error');
        return back()->with($notification);
    }
}
