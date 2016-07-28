<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void.
     */
    public function up()
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60)->nullable();
            $table->string('valor')->nullable();
            $table->string('descricao', 200)->nullable();
            //$table->char('ativo', 1);
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
        Schema::drop('planos');
    }
}
