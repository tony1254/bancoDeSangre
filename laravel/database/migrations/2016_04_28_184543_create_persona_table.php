<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cui')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fechaNacimiento');
            $table->integer('sexo');
            $table->string('vecindad');
            $table->string('telefono1')->default(0);
            $table->string('telefono2')->default(0);
            $table->string('email')->unique();
            $table->integer('grupoSangre');
            $table->integer('factorSangre');

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
        Schema::drop('persona');
    }
}
