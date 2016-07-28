<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaJuridicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_juridicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj', 14)->unique()->nullable();
            $table->string('razao_social', 100)->nullable();
            $table->string('rep_legal', 60)->nullable();
            $table->string('inscricao', 12)->nullable();

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
        Schema::drop('pessoa_juridicas');
    }
}
