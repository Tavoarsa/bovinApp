<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->integer('idAnimal');
            $table->foreign('idAnimal')->references('id')->on('animals');
            $table->string('user');
            $table->string('email');
            $table->string('file_list');   
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
        Schema::drop('email_lists');
    }
}
