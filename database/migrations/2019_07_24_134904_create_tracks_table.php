<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{

    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        
        Schema::create('tracks', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->bigInteger('photo_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('tracks');
    }
}
