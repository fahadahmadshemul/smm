<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WithDraw;
use App\Models\DepositWithdraw;
use App\Models\Notification;

class AdminWithDrawController extends Controller
{
    //all_withdraw
    public function all_withdraw(){
        $collection = WithDraw::with('payment_method')->orderBy('id', 'desc')->paginate(20);
        return view('admin.withdraw.all_withdraw', compact('collection'));
    }
    //all_withdraw
    public function pending_withdraw(){
        $collection = WithDraw::with('payment_method')->where('status', 0)->orderBy('id', 'desc')->paginate(20);
        return view('admin.withdraw.pending_withdraw', compact('collection'));
    }
    //all_withdraw
    public function completed_withdraw(){
        $collection = WithDraw::with('payment_method')->where('status', 1)->orderBy('id', 'desc')->paginate(20);
        return view('admin.withdraw.approved_withdraw', compact('collection'));
    }
    //complete_withdraw
    public function complete_withdraw($id){
        $withdraw = WithDraw::findOrFail($id);
        $deposit_withdraw = DepositWithdraw::findOrFail(1);
        $withdraw->status = 1;
        $amount = $withdraw->amount;
        $deposit_withdraw->total_withdraw = $deposit_withdraw->total_withdraw+$amount;
        $withdraw->save();
        $deposit_withdraw->save();

        //notification
        $notify = new Notification;
        $notify->user_id = $withdraw->user_id;
        $notify->title = 'WithDraw Completed';
        $notify->description = 'Your WithDraw Request of : '. $withdraw->amount .' is Successfully Completed..!';
        $notify->save();

        $notification = array('message'=>'Complete Withdraw Successfully...!', 'alert-type'=>'info');
        return back()->with($notification);
    }
}
