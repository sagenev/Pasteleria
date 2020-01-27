<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedidos')->unsigned();
            $table->date('fechaVenta');
            $table->string('numeroDocumento');
            $table->integer('tipoDocumento')->unsigned();
            $table->integer('total');
            $table->integer('formaPago')->unsigned();
            $table->timestamps();
            $table->foreign('pedidos')->references('id')->on('pedidos');
            $table->foreign('tipoDocumento')->references('id')->on('tipoDocumentos');
            $table->foreign('formaPago')->references('id')->on('formaPago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
