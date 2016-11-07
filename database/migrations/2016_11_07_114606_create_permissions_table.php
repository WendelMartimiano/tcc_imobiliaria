<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60)->nullable();
            $table->string('descricao', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('permission_cargo', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_permission')->unsigned();
            $table->foreign('id_permission')->references('id')->on('permissions')->onDelete('cascade');
            $table->integer('id_cargo')->unsigned();
            $table->foreign('id_cargo')->references('id')->on('cargos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
        Schema::drop('permission_cargo');
    }
}
