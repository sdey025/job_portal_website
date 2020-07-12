<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $guarded = [];
    protected $fillable = ['name','email','resume'];

    //public function employee(){
     //return $this->belongsTo('App\Employee');
 }
}
