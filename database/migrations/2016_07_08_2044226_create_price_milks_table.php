<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceMilksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_milks', function (Blueprint $table) {

            $table->increments('id');
             $table->integer('idUser');
            $table->foreign('idUser')->references('id')->on('users');           
            $table->string('date');
            $table->double('price', 5, 2);
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
        Schema::drop('price_milks');
    }
}
