<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;


class PageController extends Controller
{
    //add
    public function add(){
        return view('admin.page.add_page');
    }
     //save
    public function save(Request $request){
        $request->validate([
            'page_name'=>'required',
            'page_description'=>'required',
        ]);
        $save = new Page;
        $save->page_name = $request->page_name;
        $save->page_slug = \Str::slug($request->page_name);
        $save->page_description = $request->page_description;
        $save->save();
        $notification = array('message'=>'Add Page Successfully...!', 'alert-type'=>'success');
        return back()->with($notification);
    }
    //show
    public function show(){
        $collection = Page::get();
        return view('admin.page.all_page', compact('collection'));
    }
    //edit
    public function edit($id){
        $edit = Page::findOrFail($id);
        return view('admin.page.edit_page', compact('edit'));
    }
    //update
    public function update(Request $request, $id){
        $request->validate([
            'page_name'=>'required',
            'page_description'=>'required',
        ]);
        $save = Page::findOrFail($id);
        $save->page_name = $request->page_name;
        $save->page_slug = \Str::slug($request->page_name);
        $save->page_description = $request->page_description;
        $save->save();
        $notification = array('message'=>'Update Page Successfully...!', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //delete
    public function delete($id){
        $delete = Page::findOrFail($id);
        $delete->delete();
        $notification = array('message'=>'Delete Page Successfully...!', 'alert-type'=>'error');
        return back()->with($notification);
    }
}

