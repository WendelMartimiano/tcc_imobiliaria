<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf_cnpj', 14)->unique()->nullable();
            $table->string('rg', 9)->unique()->nullable();
            $table->string('nome_razao', 100)->nullable();
            $table->string('nome_fantasia', 100)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('rep_legal', 60)->nullable();
            $table->string('inscricao', 12)->nullable();
            $table->integer('creci')->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('rua', 100)->nullable();
            $table->integer('numero')->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('uf', 2)->nullable();
            $table->char('tipo_pessoa', 1)->nullable();


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
        Schema::drop('clientes');
    }
}
