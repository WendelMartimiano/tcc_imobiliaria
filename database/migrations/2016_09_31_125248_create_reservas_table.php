<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comprador', 14)->nullable();
            $table->string('vendedor', 14)->nullable();
            $table->string('corretor', 14)->nullable();
            $table->string('descricao', 100)->nullable();

            $table->integer('id_imovel')->unsigned();
            $table->foreign('id_imovel')->references('id')->on('imoveis');
            $table->integer('id_tipo_contrato')->unsigned();
            $table->foreign('id_tipo_contrato')->references('id')->on('tipos_contratos');
            $table->integer('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id')->on('empresas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservas');
    }
}
