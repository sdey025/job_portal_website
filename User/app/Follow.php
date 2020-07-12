<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
  protected $table = 'followsystem';
  protected $guarded = [];
  protected $fillable = ['sender_id','reciever_id'];
  protected $hidden = ['created_at', 'updated_at'];
}
