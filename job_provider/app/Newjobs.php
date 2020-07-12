<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newjobs extends Model
{
  protected $table = 'newjobs';
  //protected $guarded = [];
  protected $fillable = ['company_name','job_title','location','Experience','company_size','hear','stream','salary_offer','job_desc','user_id','com_logo'];
  protected $hidden = ['created_at', 'updated_at'];
}
