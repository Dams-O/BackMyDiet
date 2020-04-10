<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataIcecubeTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('data_icecube', function (Blueprint $table) {
           $table->increments('id_data_icecube');
           $table->integer('id_user')->unsigned();
           $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
           $table->integer('calcium');
           $table->integer('prot');
           $table->integer('GL');
           $table->integer('FVSM');
           $table->integer('MG');
           $table->integer('sucre');
           $table->integer('score');
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
       Schema::dropIfExists('data_icecube');
   }
}