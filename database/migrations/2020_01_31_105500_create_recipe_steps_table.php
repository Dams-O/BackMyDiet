<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_steps', function (Blueprint $table) {
            $table->increments('id_recipe_steps');
            $table->integer('id_recipe')->unsigned();
            $table->foreign('id_recipe')->references('id_recipe')->on('recipe')->onDelete('cascade');
            $table->integer('step_number')->unsigned();
            
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
