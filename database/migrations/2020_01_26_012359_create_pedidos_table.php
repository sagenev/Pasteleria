<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigoPedido');
            $table->date('fechaPedido');
            $table->integer('cliente')->unsigned();
            $table->date('fechaPropuesta');
            $table->date('fechaRetiro');
            $table->integer('estado')->unsigned();
            $table->foreign('cliente')->references('id')->on('users');
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
        Schema::dropIfExists('pedidos');
    }
}
