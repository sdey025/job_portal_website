<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender');
            $table->string('dob');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('adhar')->unique();
            $table->string('address');
            $table->bigInteger('phone')->unique();
            $table->text('avatar');
            $table->string('stream');
            $table->string('skill');
            $table->string('project_name')->nullable();
            $table->text('project_desc')->nullable();
            $table->string('number_of_group_mem')->nullable();
            $table->text('bio')->nullable();
            $table->string('prev_job_post')->nullable();
            $table->string('prev_job_com')->nullable();
            $table->string('prev_job_res_year')->nullable();
            $table->string('final_yr_proj_name')->nullable();
            $table->text('final_yr_proj_desc')->nullable();
            $table->string('sc_inst')->nullable();
            $table->string('sc_marks')->nullable();
            $table->string('sc_board')->nullable();
            $table->string('hsc_inst')->nullable();
            $table->string('hsc_marks')->nullable();
            $table->string('hsc_board')->nullable();
            $table->string('ug_inst')->nullable();
            $table->string('ug_marks')->nullable();
            $table->string('ug_board')->nullable();
            $table->string('pg_inst')->nullable();
            $table->string('pg_marks')->nullable();
            $table->string('pg_board')->nullable();
            $table->string('curr_job_com')->nullable();
            $table->string('curr_job_post')->nullable();
            $table->string('curr_job_joining')->nullable();
            $table->string('sc_year')->nullable();
            $table->string('hsc_year')->nullable();
            $table->string('ug_year')->nullable();
            $table->string('ug_branch')->nullable();
            $table->string('pg_branch')->nullable();
            $table->string('pg_year')->nullable();





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
        Schema::dropIfExists('users');
    }
}
