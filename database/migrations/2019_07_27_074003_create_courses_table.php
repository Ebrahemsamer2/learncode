<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Course;

class CreateCoursesTable extends Migration
{
    
    public function up()
    {   
        // Schema::disableForeignKeyConstraints();

        Schema::create('courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->string('description', 1000);
            $table->string('paid')->default(Course::UNPAID);
            $table->bigInteger('photo_id')->unsigned();
            $table->bigInteger('track_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->foreign('photo_id')->references('id')->on('photos');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
