<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcoesMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcoes_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 45)->nullable();
            $table->string('uri', 150)->nullable();
            $table->string('action', 60)->nullable();
            $table->string('controller', 60)->nullable();
            $table->string('apelido', 100)->nullable();
            $table->integer('id_pai')->nullable();
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
        Schema::drop('opcoes_menus');
    }
}
