<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aliments', function (Blueprint $table) {
            $table->increments('id');           
            $table->integer('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->integer('idFarm');
            $table->foreign('idFarm')->references('id')->on('farms');
            $table->integer('idAnimal');
            $table->foreign('idAnimal')->references('id')->on('animals');   
            $table->string('alimentName');                          
            $table->string('dateApplication');      
            $table->string('dose');
            $table->double('value')->nullable();
            $table->string('responsible');           
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
        Schema::drop('aliments');
    }
}
