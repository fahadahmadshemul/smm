<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManualDeposit;
use App\Models\DepositWithdraw;
use App\Models\User;

class AdminDepositController extends Controller
{
    //pending_deposit
    public function pending_deposit(){
        $collection = ManualDeposit::with('user', 'payment_method')->where('status', 0)->orderBy('id', 'desc')->paginate(20);
        return view('admin.deposit.pending_deposit', compact('collection'));
    }
    //approve_deposit
    public function approve_deposit(){
        $collection = ManualDeposit::with('user', 'payment_method')->where('status', 1)->orderBy('id', 'desc')->paginate(20);
        return view('admin.deposit.approved_deposit', compact('collection'));
    }
    //all_deposit
    public function all_deposit(){
        $collection = ManualDeposit::with('user', 'payment_method')->orderBy('id', 'desc')->paginate(20);
        return view('admin.deposit.all_deposit', compact('collection'));
    }
    //decline_deposit
    public function make_approve_deposit ($id){
        $deposit = ManualDeposit::findOrFail($id);
        $user = User::findOrFail($deposit->user_id);
        $deposit_withdraw = DepositWithdraw::findOrFail(1);

        $d_balance = $deposit->amount;
        $u_balance = $user->deposit_balance;
        $balance = $d_balance+$u_balance;
        #====-For Total Deposit
        $total_deposit = $deposit_withdraw->total_deposit;
        $total_deposit = $total_deposit+$d_balance;

        if($user){
            $user->deposit_balance = $balance;
            $user->total_deposit = $user->total_deposit + $d_balance;
            $user->save();
            $deposit_withdraw->total_deposit = $total_deposit;
            $deposit_withdraw->save();
            $deposit->status = 1;
            $deposit->save();

            //for referal
            $refer_id = $user->refer_id;
            if($refer_id != NULL){
                $refer = User::findOrFail($refer_id);
                $referal_income = ($d_balance*4)/100;
                $refer->earning_balance = $refer->earning_balance +$referal_income;
                $refer->save();
            }
            $notification = array('message'=>'Approved Deposit Successfully...!', 'alert-type'=>'success');
            return back()->with($notification);
        }
        $notification = array('message'=>'Something Went Wronf...!', 'alert-type'=>'error');
        return back()->with($notification);
    }
    //decline_deposit
    public function decline_deposit($id){
        $deposit = ManualDeposit::findOrFail($id);
        $deposit->status = 3;
        $deposit->save();
        $notification = array('message'=>'Decline Deposit Successfully...!', 'alert-type'=>'error');
        return back()->with($notification);
    }
}
