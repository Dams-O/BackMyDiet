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
            $table->integer('id_util')->unsigned();
            $table->foreign('id_util')->references('id_utilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->integer('xp')->unsigned();
            $table->string('tier');
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
