@extends('layouts.app')
@section('title') {{'Transaccion Creacion'}}@stop

@section('content')


  
<form class="form" role="form" method="POST" action="{{ url($mid.'/transaccion/') }}">
                 {!! csrf_field() !!}
<div class="panel panel-default"  id="ver">
            <div class="panel-heading"> Validacion nueva transaccion</div>
              <div class="panel-body">
              <b>Nombre:</b>
          {{$persona->nombre.' '.$persona->apellido}}
          <br>
          <b>CUI:</b>
          {{substr($persona->cui , 0, 4)}}-{{substr($persona->cui , 4, 5)}}-{{substr($persona->cui , 9, 4)}}
          <br>
          <b>Email:</b>
          {{$persona->email}}
          <br>
          <b>Fecha de Nacimiento:</b>
          {{substr($persona->fechaNacimiento,8,2)}}-{{substr($persona->fechaNacimiento,5,2)}}-{{substr($persona->fechaNacimiento,0,4)}}
          <br>
          <b>Sexo:</b>
          {{App\CSexo::find(($persona->sexo))->nombre}}
          <br>
          
          <b>Tipo de Sangre:</b>
          {{tipoSangre($persona->grupoSangre,$persona->factorSangre)['nombre']}}
          <br>
          <b>Vecindad:</b>
          {{$persona->vecindad}}
          <br>
          <b>Telefono 1:</b>
          {{$persona->telefono1}}
          <br>
          <b>Telefono 2:</b>
          {{$persona->telefono2}}
          <br>
          <b>Peso:</b>
          {{$persona->peso}}Kg
          <br>
          <b>Estado:</b>
          @if ($persona->estado==1)
              <font color="green">
               <b>
                  Puede Donar Sangre
               </b>
              </font>
            @else
            <font color="red">
               <b>
                  NO Puede Donar Sangre
               </b>
              </font>
          @endif
<input type="text" value="{{$persona->id}}" id="persona" name="persona"  hidden="">
<div class="input-field col s6">  
                            
                              <div class="col-sm-2"><br><br>
                                Almacen:
                              </div>
                              <div class="col-sm-4">
                                
                          <select class="form-control" name="almacen" id="almacen">
                          @foreach ($almacenes as $almacen)
                            <option value="{{$almacen->id}}">{{$almacen->nombre}}</option>
                          @endforeach
                          </select>
                              </div>
                              <div class="col-sm-2"><br><br>
                                Congelador:
                              </div>
                              <div class="col-sm-4">
                                
                          <select class="form-control" name="congelador" id="congelador">
                          @foreach ($congeladores as $congelador)
                            <option value="{{$congelador->id}}">{{$congelador->nombre}}</option>
                          @endforeach
                          </select>
                              </div>
                            
                        </div>                        
<div class="row">
  
  <div class="form-group label-floating col-sm-4 ">
    <div class="input-group text-right">
      <label class="control-label " for="contenido">Contenido de Unidad</label>
      <input type="text" name="contenido" id="contenido"  class="form-control" maxlength="3">
      
      <span class="input-group-addon">ml</span>
      
    </div>
  </div>
</div>




           </div>
        </div>
<div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
    <button class="btn-floating btn-large green tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Grabar" type="submit">
      <i class="fa fa-floppy-o"></i>
    </button>
    
  </div>

</form>

  
          


  
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

      </script>
@endsection
