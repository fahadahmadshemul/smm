<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use Auth;

class NotificationController extends Controller
{
    //index
    public function index(){
        $user_id = Auth::user()->id;
        $collection = Notification::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(20);
        return view('general_user.notification.notification', compact('collection'));
    }
}
