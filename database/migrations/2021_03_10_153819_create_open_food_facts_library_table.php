<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenFoodFactsLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_food_facts_library', function (Blueprint $table) {
            $table->increments('id');
            $table->text('category_id');
            $table->text('name');
            $table->string('nb_products');
            $table->string('moy_glucides')->nullable(true);
            $table->string('moy_lipides')->nullable(true);
            $table->string('moy_proteines')->nullable(true);
            $table->string('moy_sodium')->nullable(true);
            $table->string('moy_energie')->nullable(true);
            $table->string('med_glucides')->nullable(true);
            $table->string('med_lipides')->nullable(true);
            $table->string('med_proteines')->nullable(true);
            $table->string('med_sodium')->nullable(true);
            $table->string('med_energie')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('open_food_facts_library');
    }
}
