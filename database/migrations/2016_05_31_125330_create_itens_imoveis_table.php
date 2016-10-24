<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caminho', 200)->nullable();

            $table->integer('id_imovel')->unsigned();
            $table->foreign('id_imovel')->references('id')->on('imoveis');
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
        Schema::drop('itens_imoveis');
    }
}
