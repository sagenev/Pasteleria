<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleProductos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productos')->unsigned();
            $table->integer('cantPersonas')->unsigned();
            $table->integer('precios');
            $table->timestamps();
            $table->foreign('productos')->references('id')->on('productos');
            $table->foreign('cantPersonas')->references('id')->on('cantPersonas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalleProductos');
    }
}
