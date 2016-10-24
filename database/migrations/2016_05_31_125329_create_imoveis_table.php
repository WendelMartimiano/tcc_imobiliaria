<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique()->nullable();
            $table->string('cpf_cnpj', 14)->nullable();
            $table->string('rua', 100)->nullable();
            $table->integer('numero')->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('uf', 2)->nullable();
            $table->text('descricao')->nullable();
            $table->float('valor')->nullable();
            $table->string('situacao', 10)->nullable();


            /*$table->integer('id_reserva')->unsigned();
            $table->foreign('id_reserva')->references('id')->on('reservas');

            $table->integer('id_venda')->unsigned();
            $table->foreign('id_venda')->references('id')->on('vendas');

            $table->integer('id_item')->unsigned();
            $table->foreign('id_item')->references('id')->on('itens_imoveis');*/

            $table->integer('id_tipo_imovel')->unsigned();
            $table->foreign('id_tipo_imovel')->references('id')->on('tipos_imoveis');

            $table->integer('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id')->on('empresas');

            /*$table->integer('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status_imoveis');*/
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
        Schema::drop('imoveis');
    }
}
