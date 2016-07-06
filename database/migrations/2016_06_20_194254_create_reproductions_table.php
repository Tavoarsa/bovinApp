<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReproductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reproductions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idAnimal');
            $table->foreign('idAnimal')->references('id')->on('animals');
            $table->string('heat_date');//fecha de celo
            $table->string('fertilization')->nullable();
            $table->string('likely_date')->nullable();//Fecha posible del parto
            $table->string('palpation_date')->nullable();
            $table->string('parturition')->nullable();//tipo de parto
            $table->string('gender_calf')->nullable();//sexo del ternero
            $table->string('interval_parturition')->nullable();
            $table->string('abortion_date')->nullable();
            $table->string('months_gestation')->nullable();
            $table->string('open_period')->nullable();//Periodo abierto entre cada ciclo.

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
        Schema::drop('reproductions');
    }
}
