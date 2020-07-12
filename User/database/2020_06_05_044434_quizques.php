<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Quizques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('quizques', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->text('question');
          $table->text('topic');
          $table->text('answer1');
          $table->text('answer2');
          $table->text('answer3');
          $table->text('answer4');
          $table->text('rightanswer');

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
