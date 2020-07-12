<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $table = 'messages';
  protected $guarded = [];
  protected $fillable = ['message_sender_id','message','message_reciever_id'];
  protected $hidden = ['created_at', 'updated_at'];
}
