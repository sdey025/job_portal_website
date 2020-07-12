<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'job_providers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $guarded = [];
  //  protected $fillable = [
    //    'name', 'email', 'password','curr_job_post','curr_job_com','curr_job_joining_yr','pro_image'
    //];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
