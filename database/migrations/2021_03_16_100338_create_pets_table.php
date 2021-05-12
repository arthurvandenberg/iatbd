<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users');
            $table->string('name');
            $table->string('kind');
            $table->string('image')->default('img/pets/default_1_1920.jpg');
            $table->string('image640')->default('img/pets/default_1_640.jpg');
            $table->string('image1280')->default('img/pets/default_1_1280.jpg');
            $table->string('image1920')->default('img/pets/default_1_1920.jpg');
            $table->foreign('kind')->references('kind')->on('kind_of_pet');
            $table->string('description')->nullable();
            $table->boolean('suspended')->default(false);
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
        Schema::table('pets', function (Blueprint $table) {
            $table->dropForeign('pets_owner_id_foreign');
            $table->dropForeign('pets_kind_foreign');
        });

        Schema::dropIfExists('pets');
    }
}
