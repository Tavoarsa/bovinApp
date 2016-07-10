<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMastitisMilksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastitis_milks', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->integer('idAnimal');
            $table->foreign('idAnimal')->references('id')->on('animals');
            $table->integer('idFarm');
            $table->foreign('idFarm')->references('id')->on('farms');
            $table->string('date');
            $table->double('quantity')->nullable();           
            $table->double('price_mastitis_milk')->nullable();
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
        Schema::drop('mastitis_milks');
    }
}
