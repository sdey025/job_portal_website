<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $table = 'posts';
  protected $guarded = [];
  protected $fillable = ['user_id','post_content'];
  protected $hidden = ['created_at', 'updated_at'];


}
