<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razao_social', 100)->nullable();
            $table->string('cnpj', 14)->unique()->nullable();
            $table->string('inscricao', 12)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('telefone')->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('rua', 100)->nullable();
            $table->integer('numero')->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('uf', 2)->nullable();
            $table->integer('creci')->nullable();
            //$table->char('ativo', 1);

            $table->integer('id_plano')->unsigned();
            $table->foreign('id_plano')->references('id')->on('planos');
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
        Schema::drop('empresas');
    }
}
