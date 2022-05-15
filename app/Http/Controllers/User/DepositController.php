<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\ManualDeposit;
use Auth;

class DepositController extends Controller
{
    //manual_deposit
    public function manual_deposit(){
        $payment_methods = PaymentMethod::get();
        return view('general_user.deposit.manual_deposit', compact('payment_methods'));
    }
    //save_deposit
    public function save_deposit(Request $request){
        $request->validate([
            'payment_method_id'=>'required',
            'amount'=>'required',
            'transction_id'=>'required',
        ]);

        $save = new ManualDeposit;
        $save->user_id = Auth::user()->id;
        $save->payment_method_id = $request->payment_method_id;
        $save->amount = $request->amount;
        $save->transction_id = $request->transction_id;
        $save->save();
        $notification = array('message'=>'Your Deposit Request Successfully Submited.!Please Wait Your Amount will be add your Balance within 5 mins', 'alert-type'=>'success');
        return back()->with($notification);
    }
    //instant_deposit
    public function instant_deposit(){
        return view('general_user.deposit.instant_deposit');
    }
}
