<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
  protected $table = 'quizques';
  protected $guarded = [];
  protected $fillable = ['question','topic','answer1','answer2','answer3','answer4','rightanswer'];
  protected $hidden = ['created_at', 'updated_at'];
}
