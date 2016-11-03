<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cliente_comprador', 14)->nullable();
            $table->string('cliente_vendedor', 14)->nullable();
            $table->string('corretor', 14)->nullable();
            $table->string('codigo_imovel')->nullable();
            $table->string('descricao', 100)->nullable();

            $table->integer('id_tipo_contrato')->unsigned();
            $table->foreign('id_tipo_contrato')->references('id')->on('tipos_contratos');
            $table->integer('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id')->on('empresas');

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
        Schema::drop('vendas');
    }
}
