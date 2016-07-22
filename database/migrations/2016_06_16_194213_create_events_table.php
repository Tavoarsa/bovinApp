<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('idUser');
             $table->foreign('idUser')->references('id')->on('users');
             $table->string('name', 15);
             //$table->boolean('allDay');
             $table->string('title', 100);
             $table->string('properties', 255);
             $table->timestamp('start_time');
             $table->timestamp('end_time')->nullable();
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
        Schema::drop('events');
    }
}
