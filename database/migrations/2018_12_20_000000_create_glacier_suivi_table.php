<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlacierSuiviTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('glacier_suivi', function (Blueprint $table) {
           $table->increments('id_glaicer');
           $table->integer('id_util')->unsigned();
           $table->foreign('id_util')->references('id_user')->on('users')->onDelete('cascade');
           $table->string('date', 50);
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
       Schema::dropIfExists('glacier_suivi');
   }
}