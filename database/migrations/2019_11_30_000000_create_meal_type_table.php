<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_type', function (Blueprint $table) {
            $table->increments('id_meal_type');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->integer('id_meal_category')->unsigned();
            $table->foreign('id_meal_category')->references('id_meal_category')->on('meal_categories')->onDelete('cascade');
            $table->integer('calcium')->unsigned();
            $table->integer('prot')->unsigned();
            $table->integer('GL')->unsigned();
            $table->integer('FVSM')->unsigned();
            $table->integer('MG')->unsigned();
            $table->integer('sucre')->unsigned();
            $table->integer('score')->unsigned();
            $table->timestamp('create_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_type');
    }
}
