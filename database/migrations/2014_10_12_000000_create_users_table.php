<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->integer('age');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image')->default('/img/users/default_1_1920.jpg');
            $table->string('image640')->default('/img/users/default_1_640.jpg');
            $table->string('image1280')->default('/img/users/default_1_1280.jpg');
            $table->string('image1920')->default('/img/users/default_1_1920.jpg');
            $table->string('hometown');
            $table->string('description')->nullable();
            $table->boolean('blocked')->default(0);
            $table->string('role')->default('User');
            $table->foreign('role')->references('role')->on('roles');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
