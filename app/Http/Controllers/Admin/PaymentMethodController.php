<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    //index
    public function index(){
        $collection = PaymentMethod::get();
        return view('admin.payment_method.all_payment_method', compact('collection'));
    }
    //add
    public function add(){
        return view('admin.payment_method.add_payment_method');
    }
    //save
    public function save(Request $request){
        $request->validate([
            'payment_logo'=>'required',
            'payment_name'=>'required',
        ]);
        $save = new PaymentMethod;
        $save->payment_name = $request->payment_name;
        $save->account_no_one = $request->account_no_one;
        $save->account_no_two = $request->account_no_two;
        $save->account_no_three = $request->account_no_three;
        $save->status = $request->status;
        $payment_logo = $request->payment_logo;
        if($payment_logo){
            $image_name = md5(now());
            $ext = strtolower($payment_logo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/uploads/payment_method/';
            $image_url = $upload_path.$image_full_name;
            $payment_logo->move($upload_path, $image_full_name);
            $save->payment_logo = $image_url;
        }
        $save->save();
        $notification = array('message'=>'Add Payment Method Successfully...!', 'alert-type'=>'success');
        return back()->with($notification);
    }
    //edit
    public function edit($id){
        $edit = PaymentMethod::findOrFail($id);
        return view('admin.payment_method.edit_payment_method', compact('edit'));
    }
    //update
    public function update(Request $request, $id){
        $request->validate([
            'payment_name'=>'required',
        ]);
        $update = PaymentMethod::findOrFail($id);
        $update->payment_name = $request->payment_name;
        $update->account_no_one = $request->account_no_one;
        $update->account_no_two = $request->account_no_two;
        $update->account_no_three = $request->account_no_three;
        $update->status = $request->status;
        $payment_logo = $request->payment_logo;
        if($payment_logo){
            $image_name = md5(now());
            $ext = strtolower($payment_logo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/uploads/payment_method/';
            $image_url = $upload_path.$image_full_name;
            $payment_logo->move($upload_path, $image_full_name);
            $update->payment_logo = $image_url;
        }
        $update->save();
        $notification = array('message'=>'Update Payment Method Successfully...!', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //delete
    public function delete ($id){
        $delete = PaymentMethod::findOrFail($id);
        unlink($delete->payment_logo);
        $delete->delete();
        $notification = array('message'=>'Delete Payment Method Successfully...!', 'alert-type'=>'error');
        return back()->with($notification);
    }
}
