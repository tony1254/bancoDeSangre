<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTSangreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sangre', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idGrupoSangre');
            $table->integer('idFactorSangre');
            $table->integer('idAlmacen');
            $table->integer('idCongelador');
            $table->integer('cantidad');
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
        Schema::drop('t_sangre');
    }
}
