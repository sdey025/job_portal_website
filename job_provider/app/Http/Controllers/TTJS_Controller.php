<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\TTJS;
class TTJS_Controller extends Controller
{
    public function message($id){
      $data = DB::table('users')
      ->where('id',$id)->get();
      return view('message',['data' => $data]);
    }
    public function sendmessage(Request $request,$name){
      $message = new TTJS();
      $message->sender_name = $request->user()->name;
      $message->message = $request->input('message');
      $message->reciever_name = $name;

      $message->save();
      return back();
    }
}
