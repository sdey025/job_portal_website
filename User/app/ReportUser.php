<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{
  protected $table = 'report_user';
  protected $guarded = [];
  protected $fillable = ['reported_user_id','reason','reporter_user_id'];
  protected $hidden = ['created_at', 'updated_at'];
}
