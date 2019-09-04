<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
   
    public function up()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::create('questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->string('answers', 1000); // seperated by space
            $table->string('right_answer');
            $table->integer('score');

            $table->bigInteger('quiz_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            // Delete Questions Belongs to this Quiz
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');

        });
        
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
