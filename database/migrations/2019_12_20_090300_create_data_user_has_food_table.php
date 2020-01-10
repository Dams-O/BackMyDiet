<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataUserHasFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_user_has_food', function (Blueprint $table) {
            $table->increments('id_data_user_hf');
            $table->integer('id_data_user')->unsigned();
            $table->foreign('id_data_user')->references('id_data_user')->on('data_user')->onDelete('cascade');
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
        Schema::dropIfExists('data_user_has_food');

    }
}
