<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    //index
    public function index(){
        $notice = Notice::findOrFail(1);
        return view('admin.home.notice', compact('notice'));
    }
    //update
    public function update(Request $request){
        $update = Notice::findOrFail(1);
        $update->description = $request->description;
        $update->save();
        $notification = array('message'=>'Update Notice Successfully...!', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //show
    public function show(){
        $notice = Notice::findOrFail(1);
        return view('general_user.notice', compact('notice'));
    }
}

