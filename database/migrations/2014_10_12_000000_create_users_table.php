<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('admin')->default(User::REGULAR_USER);
            $table->integer('score')->default(0);
            $table->bigInteger('photo_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('photo_id')->references('id')->on('photos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
