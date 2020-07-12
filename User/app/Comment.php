<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comments';
  protected $guarded = [];
  protected $fillable = ['master_user_id','post_id','comment','other_user_id','commenter_name'];
  protected $hidden = ['created_at', 'updated_at'];

}
