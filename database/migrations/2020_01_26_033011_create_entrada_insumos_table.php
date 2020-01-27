<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradaInsumos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaCompra');
            $table->integer('insumo')->unsigned();
            $table->integer('cantidadComprada');
            $table->timestamps();
            $table->foreign('insumo')->references('id')->on('insumos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradaInsumos');
    }
}
