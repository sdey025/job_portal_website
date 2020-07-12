<?php

namespace App\Http\Controllers;
use App\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(Request $request,$id){
      $follow = new Follow();

      $follow->sender_id = $request->user()->id;
      $follow->reciever_id = $id;

      $follow->save();
      return back();

    }
    public function follow(){
      return('follow');
    }
}
