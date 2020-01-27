<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallePedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('detalleProducto')->unsigned();
            $table->integer('pedidos')->unsigned();
            $table->integer('estado')->unsigned();
            $table->integer('cantidad');
            $table->integer('total');
            $table->foreign('detalleProducto')->references('id')->on('productos');
            $table->foreign('pedidos')->references('id')->on('pedidos');
            $table->foreign('estado')->references('id')->on('estadoPedido');
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
        Schema::dropIfExists('detallePedidos');
    }
}
