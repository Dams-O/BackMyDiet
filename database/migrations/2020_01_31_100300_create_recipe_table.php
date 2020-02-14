<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe', function (Blueprint $table) {
            $table->increments('id_recipe');
            $table->string('picture', 150);
            $table->string('title', 50);
            $table->string('hashtag', 50); 
            $table->integer('id_meal_category')->unsigned();
            $table->foreign('id_meal_category')->references('id_meal_category')->on('meal_categories')->onDelete('cascade');
            $table->integer('preparation_time')->unsigned();
            $table->integer('cooking_time')->unsigned();
            $table->integer('parts_number')->unsigned();

            
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe');

    }
}
