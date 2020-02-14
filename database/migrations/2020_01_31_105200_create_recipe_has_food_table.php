<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeHasFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_has_food', function (Blueprint $table) {
            $table->increments('id_recipe_hf');
            $table->integer('id_recipe')->unsigned();
            $table->foreign('id_recipe')->references('id_recipe')->on('recipe')->onDelete('cascade');
            $table->integer('id_food')->unsigned();
            $table->foreign('id_food')->references('id_food')->on('food_library')->onDelete('cascade');
            $table->string('description', 255);
            });
         }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_has_food');

    }
}
