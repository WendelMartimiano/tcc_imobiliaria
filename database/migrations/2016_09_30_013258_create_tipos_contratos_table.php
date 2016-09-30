<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_contrato', 50)->nullable();

            $table->integer('id_reserva')->unsigned();
            $table->foreign('id_reserva')->references('id')->on('reservas');

            $table->integer('id_venda')->unsigned();
            $table->foreign('id_venda')->references('id')->on('vendas');
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
        Schema::drop('tipos_contratos');
    }
}
