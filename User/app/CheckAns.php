<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckAns extends Model
{
  protected $table = 'checkans';
  protected $guarded = [];
  protected $fillable = ['qid','rightans','myoption','uid'];
  protected $hidden = ['created_at', 'updated_at'];
}
