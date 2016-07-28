<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_fisicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf', 11)->unique()->nullable();
            $table->string('rg', 9)->unique()->nullable();
            $table->string('nome', 60)->nullable();
            $table->string('sexo', 10)->nullable();
            $table->date('data_nascimento')->nullable();

            $table->integer('id_pessoa')->unsigned();
            $table->foreign('id_pessoa')->references('id')->on('pessoas');
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
        Schema::drop('pessoa_fisicas');
    }
}
