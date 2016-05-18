@extends('layouts.app')
@section('title') {{'Transacciones'}}@stop

@section('content')

<div class="panel panel-default"  id="ver">
<script type="text/javascript">
            $(document).on('ready',function(){

   $('#busqueda').toggle();

  });
</script>
            <div id="titulo" class="panel-body" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').focus();">Transacciones<i class="material-icons right">search</i></div>
  
      <form id="busqueda" class="form" role="form" method="get" action="{{ url($mid.'/transaccion') }}">
        <div class="input-field ">        
          <input class="input-field" id="search" name="search" type="search" required placeholder="Ingrese numero de Transaccion">
          <label for="search"></label>
          <i class="material-icons" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').val('');">close</i>
        </div>
      </form>
<div class="panel-footer">
@if (count($transaccions)==0)
<div class="row">
  <div class="col-sm-6 col-sm-offset-3 text-center">
  <h4>
    Hoy no hay Movimiento.
  </h4>
  <img src="{{ url('bower_components\contenido\donacion.png') }}" class="img-responsive" alt="Responsive image">
    
  </div>
</div>

@endif
  <ul class="collection">

  @foreach ($transaccions as $transaccion)
        <!-- {{$unidad=App\TUnidad::find($transaccion->idUnidad)}} -->
    <!-- {!!var_dump($tipoSangre=tipoSangre($unidad->idGrupoSangre,
                                            $unidad->idFactorSangre))!!} -->
        
    <li class="collection-item avatar">
        <a href="{{ url($mid.'/transaccion/'.$transaccion->idTransaccion.'') }}" 
        {{$transac=App\TTransaccion::find($transaccion->idTransaccion)}}
@if ($unidad->idEstadoUnidad==2)
          class=" usub  circle white-text waves-effect waves-light black ">
        <div class="row text-center" >
          <div style="line-height:40px" >
            <i class="material-icons" >remove</i>
          </div>
        </div>        
        </a>
@else
        @if ($transac->idTipoTransaccion==1)
          class=" usub  circle white-text waves-effect waves-light green
        ">
        <div class="row text-center" >
          <div style="line-height:40px" >
            <i class="material-icons" >call_received</i>
          </div>
        </div>
        </a>
        @endif
        @if ($transac->idTipoTransaccion==2)
          class=" usub  circle white-text waves-effect waves-light red
        ">
        <div class="row text-center" >
          <div style="line-height:40px" >
            <i class="material-icons" >call_made</i>
          </div>
        </div>
        </a>
        @endif
        @if ($transac->idTipoTransaccion==3)
          class=" usub  circle white-text waves-effect waves-light blue
        ">
        <div class="row text-center" >
          <div style="line-height:40px" >
            <i class="material-icons" >call_split</i>
          </div>
        </div>
        </a>
        @endif

@endif        
        <span class="title">{{$tipoSangre['nombre']}}</span>
        <p>         
          Unidad #: {{$transaccion->idUnidad}} de Transaccion #:{{$transaccion->idTransaccion}}<br>
          Contenido: {{$unidad->contenido}}ml
        </p>
      <div class="secondary-content">
        <a href="{{ url($mid.'/transaccion/'.$transaccion->idTransaccion.'') }}" class=" btn-xs   blue-text waves-effect waves-blue transparent">
                              <i class="material-icons" style="  vertical-align: top;">
                                remove_red_eye
                              </i>
        </a>
        <!--  <a href="{{ url($mid.'/transaccion/'.$transaccion->idTransaccion.'/edit') }}" class=" btn-xs   amber-text waves-effect waves-yellow transparent">
                            <i class="material-icons" style="  vertical-align: top;">
                              create
                            </i>
         </a> -->
      </div>
    </li>
  @endforeach
         <div class="text-center">
        @if(empty($busqueda))
          {!! $transaccions->links() !!} 
        @else
          {!! $transaccions->appends(['search' => $busqueda])->links() !!} 
        @endif
         </div>

  </ul> 
</div>
        </div>      
  
</div>
    <div class="fixed-action-btn vertical click-to-toggle" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="material-icons" style="vertical-align: top">menu</i>
    </a>
    <ul>
      <li>
        <a class="btn-floating  green tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nueva Donacion" type="submit" href="{{ url($mid.'/transaccion/create/valida') }}">
        <i class="material-icons"  style="vertical-align: top">add</i>
        </a>
      </li>
      <li>
      <a class="btn-floating  red tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nuevo Retiro" type="submit" href="{{ url($mid.'/transaccion/create/valida/retiro') }}">
        <i class="material-icons"  style="vertical-align: top">remove</i>
        </a>
      </li>
      <li>
      <a class="btn-floating  blue tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Catalago de Unidades" type="submit" href="{{ url($mid.'/unidad') }}">
        <i class="fa fa-tint fa-2x" aria-hidden="true"></i>
        </a>
      </li>
    </ul>
  </div>
          
  <!-- <div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
      <a class="btn-floating btn-large green tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nuevo" type="submit" href="{{ url($mid.'/transaccion/create/valida') }}">
        <i class="material-icons"  style="vertical-align: top">add</i>
      </a>
      
    </div> -->

  
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
