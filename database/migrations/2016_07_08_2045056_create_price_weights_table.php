<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_weights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser');
            $table->foreign('idUser')->references('id')->on('users');           
            $table->string('date');
            $table->double('price');
            $table->string('details'); 
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
        Schema::drop('price_weights');
    }
}
