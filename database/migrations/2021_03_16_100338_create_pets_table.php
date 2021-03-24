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
            $table->string('image')->default('img/pets/default_1.jpg');
            $table->foreign('kind')->references('kind')->on('kind_of_pet');
            $table->string('description')->nullable();
            $table->boolean('available')->default(1);
            $table->string('available_date')->nullable();
            $table->string('length_of_stay')->nullable();
            $table->string('compensation_amount')->nullable();
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
