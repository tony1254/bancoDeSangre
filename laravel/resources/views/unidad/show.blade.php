@extends('layouts.app')
@section('title') {{'Catalogo de Personas'}}@stop

@section('content')

<div class="panel panel-default " id="ver" >
  
            <div class="panel-heading" >Unidad de Sangre</div>
            <div class="panel-body">
     <!-- {!!var_dump($tipoSangre=tipoSangre($unidad->idGrupoSangre,
                                            $unidad->idFactorSangre))!!} -->        
        
            <b>Unidad #:</b> {{$unidad->id}}
          <br>
            <b>Tipo de Sangre:</b> {{$tipoSangre['nombre']}}
          <br>
            <b>Hemoderivado:</b> {{App\CHemoderivado::find($unidad->idHemoderivado)->nombre}}
          <br>
            <b>Almacen:</b> {{App\CAlmacen::find($unidad->idAlmacen)->nombre}}
          <br>
            <b>Congelador:</b> {{App\CCongelador::find($unidad->idCongelador)->nombre}}
          <br>
          <b>Caduca: </b>
          <!-- +86400*25 para probar fecha vencida -->
@if ($unidad->caduca==date('Y-m-d', time()))
  <font color="red">
    <b>
      {{substr($unidad->caduca,8,2)}}-{{substr($unidad->caduca,5,2)}}-{{substr($unidad->caduca,0,4)}} Sangre Vencida
    </b>
  </font>
@else          
  <font color="green">
    <b>
      {{substr($unidad->caduca,8,2)}}-{{substr($unidad->caduca,5,2)}}-{{substr($unidad->caduca,0,4)}}
    </b>
  </font>
@endif
          <br>
          <b>estado: </b>{{App\CEstadoUnidad::find($unidad->idEstadoUnidad)->nombre}}


        </div>
        
  
      </div>

  
          
  <div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
      
      <a class="btn btn-floating btn-fab amber  darken-3 waves-effect waves-light tooltipped
                @if (count($unidad)==0)
                disabled
                @endif
              "  data-position="left" data-delay="50" data-tooltip="Editar unidad" href="{{ url('/'.$mid.'/unidad/'.$unidad->id.'/edit') }}"><i class="material-icons">create</i></a>
    </div>

  

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


  
  			 	