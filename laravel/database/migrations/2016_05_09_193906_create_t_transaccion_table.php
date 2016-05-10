<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTTransaccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_transaccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCliente');
            $table->integer('idUsuario');
            $table->integer('idTipoTransaccion');
            $table->integer('idAlmacen');
            $table->integer('idCongelador');
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
        Schema::drop('t_transaccion');
    }
}
