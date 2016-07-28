<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcoesPlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcoes_planos', function (Blueprint $table) {
            $table->integer('id_plano')->unsigned();
            $table->foreign('id_plano')->references('id')->on('planos');

            $table->integer('id_opcao')->unsigned();
            $table->foreign('id_opcao')->references('id')->on('opcoes_menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('opcoes_planos');
    }
}
