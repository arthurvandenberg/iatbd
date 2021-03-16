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
            $table->string('kind_of_pet');
            $table->foreign('kind_of_pet')->references('kind')->on('kind_of_pet');
            $table->boolean('available');
            $table->string('available_date');
            $table->string('length_of_stay');
            $table->string('compensation_ammount');
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
            $table->dropForeign('pets_kind_of_pet_foreign');
        });

        Schema::dropIfExists('pets');
    }
}
