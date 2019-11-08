<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAffCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_aff_categories', function (Blueprint $table) {
            $table->increments('id_uac');
            $table->integer('id_util')->unsigned();
            $table->foreign('id_util')->references('id_user')->on('users')->onDelete('cascade');
            $table->integer('id_categorie')->unsigned();
            $table->foreign('id_categorie')->references('id_categorie')->on('categories')->onDelete('cascade');
            $table->timestamp('create_at');
            //$table->timestamp('update_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_aff_categories');
    }
}
