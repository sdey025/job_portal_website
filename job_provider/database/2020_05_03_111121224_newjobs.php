<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Newjobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('newjobs', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('company_name');
          $table->string('job_title');
          $table->string('location');
          $table->string('Experience');
          $table->string('company_size');
          $table->string('hear');
          $table->string('stream');
          $table->string('salary_offer');
          $table->string('job_desc');
          $table->Integer('user_id');
          $table->text('com_logo')->nullable();
          $table->rememberToken();
          $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
