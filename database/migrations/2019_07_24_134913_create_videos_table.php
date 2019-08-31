<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
   
    public function up()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::create('videos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->string('link');
            $table->bigInteger('photo_id')->unsigned();
            $table->bigInteger('course_id')->unsigned();
            $table->timestamps();

            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('course_id')->references('id')->on('courses');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
