<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TTJS extends Model
{
  protected $table = 'job_seekers';
  //protected $guarded = [];
  protected $fillable = ['sender_name','message','reciever_name'];
  protected $hidden = ['created_at', 'updated_at'];
}
