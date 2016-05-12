<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTUnidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idSangre');
            $table->integer('idHemoderivado');
            $table->integer('idAlmacen');
            $table->integer('idCongelador');
            $table->integer('idGrupoSangre');
            $table->integer('idFactorSangre');
            $table->date('caduca');
            $table->decimal('contenido', 5, 2);
            $table->integer('idEstadoUnidad');
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
        Schema::drop('t_unidad');
    }
}
