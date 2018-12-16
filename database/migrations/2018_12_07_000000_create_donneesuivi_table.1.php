<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonneeSuiviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donnee_suivi', function (Blueprint $table) {
            $table->increments('id_donnee');
            $table->integer('id_util')->unsigned();
            $table->foreign('id_util')->references('id_utilisateur')->on('utilisateurs')->onDelete('cascade');
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
        //
    }
}
