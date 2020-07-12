<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use App\Notification;
use App\User;
use DB;
use App\Comment;
use App\message_of_job_provider;
use App\Follow;

class NotificationController extends Controller
{
    public function gothere(){
      return view('noti');
    }
    public function getnotification(){
      $users = DB::table('users')
      ->get();
      return view('noti', ['users' => $users]);
    }

}
