<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCantidadIsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantidadInsumos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto')->unsigned();
            $table->integer('insumos')->unsigned();
            $table->integer('cantidadInsumo');
            $table->timestamps();
            $table->foreign('producto')->references('id')->on('productos');
            $table->foreign('insumos')->references('id')->on('insumos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cantidadInsumos');
    }
}
