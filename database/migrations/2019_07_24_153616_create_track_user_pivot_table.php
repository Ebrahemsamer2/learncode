<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackUserPivotTable extends Migration
{

    public function up()
    {
        Schema::create('track_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->bigInteger('track_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            
            $table->foreign('track_id')->references('id')->on('tracks');
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    public function down()
    {
        Schema::dropIfExists('track_user');
    }
}
