<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	  protected $table= 'persona';
        protected $fillable = [
        'nombre', 'apellido', 'vecindad',"telefono1","telefono2","cui","email","sexo","grupoSangre","factorSangre","fechaNacimiento"
    ];

}
