<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\WithDraw;
use App\Models\ManualDeposit;
use Auth;

class WithDrawController extends Controller
{
    //wallet
    public function wallet(){
        $payment_methods = PaymentMethod::get();
        return view('general_user.withdraw.wallet', compact('payment_methods'));
    }
    //get_user_amount
    public function get_user_amount(){
        $user = User::find(Auth::user()->id);
        $earning_balance = $user->earning_balance;
        return floor($earning_balance);
    }
    //save_withdraw
    public function save_withdraw(Request $request){
        $request->validate([
            'payment_method_id'=>'required',
            'receive_account'=>'required',
            'amount'=>'required',
        ]);

        $save = new WithDraw;
        $save->user_id = Auth::user()->id;
        $save->payment_method_id = $request->payment_method_id;
        $save->receive_account = $request->receive_account;
        //amount
        $amount = $request->amount;
        $percent = ($amount*10)/100;
        $total = $amount+$percent;
        $earning_balance = Auth::user()->earning_balance;
        if($earning_balance > $total){
            $user = User::findOrFail(Auth::user()->id);
            $user->earning_balance = ($user->earning_balance-$total);
            $user->save();
        }else{
            $notification = array('message'=>'insufficient Balance..!', 'alert-type'=>'error');
            return back()->with($notification);
        }
        $save->amount  = $total;
        $save->receive_account = $request->receive_account;
        $save->save();
        $notification = array('message'=>'Withdraw Request Place Successfully..!Please Wait 5 to 10 min.', 'alert-type'=>'info');
        return back()->with($notification);
    }
    //withdraw_history
    public function withdraw_history(){
        $collection = WithDraw::with('payment_method')->orderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();
        return view('general_user.withdraw.withdraw', compact('collection'));
    }
    //deposit_history
    public function deposit_history(){
        $collection = ManualDeposit::with('payment_method')->orderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();
        return view('general_user.withdraw.deposit', compact('collection'));
    }
    
}
