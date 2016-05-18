@extends('layouts.app')
@section('title') {{'Creacion de Persona'}}@stop

@section('content')

<div class="panel panel-default"  id="ver">

            <div id="titulo" class="panel-heading">Creacion de Persona</div>
            <div id="titulo" class="panel-body">
<form class="form" role="form" method="POST" action="{{ url($mid.'/persona/') }}">
                        {!! csrf_field() !!}
                  <div class="row " >

                          <div class="input-field col s6">
                                <input  id="nombre" name="nombre" type="text" class="validate" value="" required>
                                <label class="active"  for="nombree">Nombre</label>
                            </div> 
                          <div class="input-field col s6">
                                <input  id="apellido" name="apellido" type="text" class="validate" value="" required>
                                <label class="active"  for="nombree">Apellidos</label>
                            </div> 
                            <div class="input-field col s6">
                                <input  id="email" name="email" type="email" class="validate" value="" required>
                                <label class="active"  for="email">Email</label>
                            </div>
                            <div class="input-field col s6">
                                <input placeholder="Ingrese CUI" id="cui" name="cui" type="text" class="validate cui" value="" required
                            title="Ingrese un CUI valido : 9999-99999-9999">
                                
                                <label class="active"  for="emaile">CUI</label>
                            </div>
                            <div class="input-field col s6">  
                            
                              <div class="col-sm-2"><br><br>
                                Sexo:
                              </div>
                              <div class="col-sm-10">
                                
                          <select class="form-control" name="sexo" id="sexo">
                          @foreach ($sexos as $sexo)
                            <option value="{{$sexo->id}}">{{$sexo->nombre}}</option>
                          @endforeach
                          </select>
                              </div>
                            
                        </div>
                            <div class="input-field col s6">  
                            
                              <div class="col-sm-6"><br><br>
                                Tipo de Sangre:
                              </div>
                              <div class="col-sm-3">
                                
                          <select class="form-control" name="grupoSangre" id="grupoSangre">
                          @foreach (App\CGrupoSangre::all() as $sexo)
                            <option value="{{$sexo->id}}">{{$sexo->nombre}}</option>
                          @endforeach
                          </select>
                              </div>
                              <div class="col-sm-3">
                                
                          <select class="form-control" name="factorSangre" id="factorSangre">
                          @foreach (App\CFactorSangre::all() as $sexo)
                            <option value="{{$sexo->id}}">{{$sexo->nombre}}</option>
                          @endforeach
                          </select>
                              </div>
                            
                        </div>
                        <div class="input-field col s6">
                                <input  id="vecindad" name="vecindad" type="text" class="validate" value="" required>
                                <label class="active"  for="nombree">Vecindad</label>
                            </div>        
                            <div class="input-field col s6">
                                <input placeholder="Ingrese Nombre de fechaNacimiento" id="fechaNacimiento" name="fechaNacimiento" type="date" class="validate fechaNacimiento " value="" required
                            title="Ingrese un fechaNacimiento valido">
                                
                                <label class="active"  for="emaile">Fecha de Nacimiento</label>
                            </div>
                            <script type="text/javascript">
                                $('.datepicker').pickadate({
                              selectMonths: true, // Creates a dropdown to control month
                              selectYears: 15 // Creates a dropdown of 15 years to control year
                            });
                                  
                            </script>
                            <div class="input-field col s6">
                                <input placeholder="Ingrese Nombre de telefono1" id="telefono1" name="telefono1" type="text" class="validate telefono1" value="" required
                            title="Ingrese un telefono1 valido : 9999-9999">
                                
                                <label class="active"  for="emaile">Telefono 1</label>
                            </div>
                            <div class="input-field col s6">
                                <input placeholder="Ingrese Nombre de telefono2" id="telefono2" name="telefono2" type="text" class="validate telefono2"  
                            title="Ingrese un telefono2 valido : 9999-9999">
                                
                                <label class="active"  for="emaile">telefono 2</label>
                            </div>
                           <div class="input-field col s6">
                                <input placeholder="Ingrese Nombre de peso" id="peso" name="peso" type="text" class="validate peso"  value=""
                            title="Ingrese un peso valido : 999.99">
                                <label class="active"  for="emaile">Peso Kg</label>
                            </div>          


                      </div>
              </div>
</div>

  
  			 	
  <div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
      <button class="btn-floating btn-large green tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nuevo" type="submit">
      	<i class="fa fa-floppy-o"></i>
      </button>
      
    </div>

  
</form>
      <script type="text/javascript">
      function verper(){
  
  
$( '#carga' ).show();
  $( '#ver2' ).toggle();

location.reload();
}
        $('#carga').toggle();
                $("#cui").mask("9999-99999-9999");
                $("#telefono1").mask("9999-9999");
                $("#telefono2").mask("9999-9999");
                // $("#peso").mask("999.99",{placeholder:"000.00"});

      </script>
@endsection
