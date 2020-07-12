<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Applyjob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('applyjob', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->Integer('apply_id');
          $table->string('com_name');
          $table->Integer('candidate_id');
          $table->Integer('job_id');
          $table->text('resume');
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
