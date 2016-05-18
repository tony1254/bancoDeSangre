@extends('layouts.app')
@section('title') {{'Edicion Unidad #'.$unidad->id}}@stop

@section('content')


  
<form class="form" role="form" method="POST" action="{{ url($mid.'/unidad/'.$unidad->id) }}">
                 {!! csrf_field() !!}
<input type="text" name="_method" value="PUT" hidden>
                 
<div class="panel panel-default"  id="ver">
            <div class="panel-heading"> Validacion nueva unidad # {{$unidad->id}}</div>
              <div class="panel-body">
  <div class="input-field col-sm-4">  
                            
                              <div class="col-sm-6"><br><br>
                                Tipo de Sangre:
                              </div>
                              <br><br>
               <!-- {!!var_dump($tipoSangre=tipoSangre($unidad->idGrupoSangre,
                                            $unidad->idFactorSangre))!!} -->                    
                             {{$tipoSangre['nombre']}}
                            
                        </div>  
    <div class="input-field col-sm-8">  
                            
            <div class="col-sm-2"><br><br>
              Almacen:
            </div>
            <div class="col-sm-4">
              
        <select class="form-control" name="almacen" id="almacen">
        @foreach ($almacenes as $almacen)
          <option value="{{$almacen->id}}"
      @if ($almacen->id==$unidad->idAlmacen)
        selected="" 
      @endif
      >{{$almacen->nombre}}</option>
        @endforeach
        </select>
            </div>
            <div class="col-sm-2"><br><br>
              Congelador:
            </div>
            <div class="col-sm-4">
              
        <select class="form-control" name="congelador" id="congelador">
        @foreach ($congeladores as $congelador)
          <option value="{{$congelador->id}}"
      @if ($congelador->id==$unidad->idCongelador)
        selected="" 
      @endif
      >{{$congelador->nombre}}</option>
        @endforeach
        </select>
            </div>
          
      </div>
<div class="col-sm-2"><br><br>
  Hemoderivado:
</div>
<div class="col-sm-3">
  <select class="form-control" name="hemoderivado" id="hemoderivado" disabled="">
    @foreach (App\CHemoderivado::all() as $sexo)
      <option value="{{$sexo->id}}"
      @if ($sexo->id==$unidad->idHemoderivado)
        selected="" 
      @endif
      >{{$sexo->nombre}}</option>
    @endforeach
  </select>
</div>
<div class="col-sm-2"><br><br>
  Estado:
</div>
<div class="col-sm-3">
  <select class="form-control" name="estado" id="estado" >
    @foreach (App\CEstadoUnidad::all() as $sexo)
      <option value="{{$sexo->id}}"
      @if ($sexo->id==$unidad->idEstadoUnidad)
        selected="" 
      @endif
      >{{$sexo->nombre}}</option>
    @endforeach
  </select>
</div>

<div class="row">
  
  <div class="form-group label-floating col-sm-4 ">
    <div class="input-group text-right">
      <label class="control-label " for="contenido">Contenido de Unidad</label>
      <input type="text" name="contenido" id="contenido"  class="form-control" maxlength="3" value="{{$unidad->contenido}}">
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
