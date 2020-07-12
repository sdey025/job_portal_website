<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  protected $table = 'notifications';
  protected $guarded = [];
  protected $fillable = ['from_user_id','notificaion_type','to_user_id'];
  protected $hidden = ['created_at', 'updated_at'];
}
