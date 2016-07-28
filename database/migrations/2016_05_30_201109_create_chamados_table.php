<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_cadastro')->nullable();
            $table->string('titulo', 30)->nullable();
            $table->string('descricao', 500)->nullable();

            $table->integer('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id')->on('empresas');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

            $table->integer('id_iteracao')->unsigned();
            $table->foreign('id_iteracao')->references('id')->on('iteracoes');

            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status_chamados');
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
        Schema::drop('chamados');
    }
}
