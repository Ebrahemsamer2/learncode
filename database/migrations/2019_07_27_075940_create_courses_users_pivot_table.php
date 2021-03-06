<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesUsersPivotTable extends Migration
{
   
    public function up()
    {   
        // Schema::disableForeignKeyConstraints();

        Schema::create('course_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    public function down()
    {
        Schema::dropIfExists('course_user');
    }
}
