<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_user', function (Blueprint $table) {
            $table->increments('id_data_user');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('data_user');
    }
}
