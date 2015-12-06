<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produtos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos');

            $table->decimal('preco');
            $table->smallInteger('quantidade');

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
        Schema::drop('pedido_produtos');
    }
}
