<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id_stats');
            $table->string('id_util', 45)->unsigned();
            $table->foreign('id_util')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->integer('adresse1', 255)->nullable();
            $table->string('adresse2', 255)->nullable();
            $table->string('adresse3', 255)->nullable();
            $table->string('code_postal', 10)->nullable();
            $table->string('ville', 45)->nullable();
            $table->decimal('latitude', 12, 6)->nullable();
            $table->decimal('longitute', 12, 6)->nullable();
            $table->string('nom_occupant', 45)->nullable();
            $table->string('prenom_occupant', 45)->nullable();
            $table->string('commentaire', 500)->nullable();
            $table->integer('esp_utilisateur_idutilisateur')->unsigned();
            $table->foreign('esp_utilisateur_idutilisateur')->references('idutilisateur')->on('esp_utilisateur')->onDelete('cascade');
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
