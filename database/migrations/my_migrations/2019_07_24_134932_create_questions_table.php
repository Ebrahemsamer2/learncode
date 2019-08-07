<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->string('answers', 1000); // seperated by space
            $table->string('right_answer');
            $table->integer('score');
            $table->bigInteger('track_id')->unsigned();
            $table->timestamps();

            // Delete Questions Belongs to this Track
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
