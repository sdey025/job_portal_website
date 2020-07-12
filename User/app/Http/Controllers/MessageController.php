<?php

namespace App\Http\Controllers;
use App\User;
use App\Message;
use DB;
use App\Notifications\RepliedToThread;
use App\message_of_jobprovider;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendmessage(Request $request,$id){
      $threads = $request->get('threads');
      $data = DB::table('users')
      ->where('id',$id)->get();
      return view('message',['data' => $data]);
    }
    public function message(Request $request){
      $message = $request->get('message');
      return view('message',['data' => $data]);
    }
    public function sendingmessage(Request $request,$id){
      $message = new Message();
      $message->message_sender_id = $request->user()->id;
      $message->message = $request->input('message');
      $message->message_reciever_id = $id;

      $message->save();
    //  $users = User::find($userIN->id)
  //  $msg =  Message::find($request->id);
  //  User::find($msg->user->sender_id)->notify(new RepliedToThread($msg));
      return back();
    }
    public function jp(){
      return view('message_from_job_provider');
    }
    public function mssgfjp(){
      $data = DB::table('job_providers')
      //->join('job_providers','job_providers.name','=','job_seekers.sender_name')
      ->select('job_providers.name')
      ->get();
      return view('message_from_job_provider',['data' => $data]);
    }
    public function message_to_provider(Request $request,$name){
      $msg = new message_of_jobprovider();
      $msg->sender_name = $request->user()->name;
      $msg->message =$request->input('jpmessage');
      $msg->reciever_name = $name;

      $msg->save();
      return back();
    }

}
