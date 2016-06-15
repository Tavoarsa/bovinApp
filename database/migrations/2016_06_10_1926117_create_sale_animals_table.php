<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_animals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->integer('idFarm');
            $table->foreign('idFarm')->references('id')->on('farms'); 
            $table->string('image');
            $table->string('name');
            $table->string('slug');
            $table->string('age');
            $table->string('breed');
            $table->string('gender');
            $table->string('registrationNumber')->nullable();
            $table->string('farm')->nullable();
            $table->string('feature')->nullable();
            $table->string('price');
            $table->string('seller_name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('details')->nullable();
          

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
        Schema::drop('sale_animals');
    }
}
