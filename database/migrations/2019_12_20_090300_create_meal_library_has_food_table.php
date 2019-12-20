<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealLibraryHasFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_library_has_food', function (Blueprint $table) {
            $table->increments('id_meal_library_hf');
            $table->integer('id_meal_library')->unsigned();
            $table->foreign('id_meal_library')->references('id_meal_library')->on('meal_library')->onDelete('cascade');
            $table->integer('id_food')->unsigned();
            $table->foreign('id_food')->references('id_food')->on('food_library')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_library_has_food');

    }
}
