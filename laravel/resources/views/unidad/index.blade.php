@extends('layouts.app')
@section('title') {{'Catalogo de usuarios'}}@stop

@section('content')

<div class="panel panel-default"  id="ver">
<script type="text/javascript">
            $(document).on('ready',function(){

	 $('#busqueda').toggle();

	});
</script>
		        <div id="titulo" class="panel-body" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').focus();">Catalogo de Unidad<i class="material-icons right">search</i></div>
  
      <form id="busqueda" class="form" role="form" method="get" action="{{ url($mid.'/unidad') }}">
        <div class="input-field">        
          <input class="input-field" id="search" name="search" type="search" required placeholder="Ingrese numero de la unidad">
          <label for="search"></label>
          <i class="material-icons" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').val('');">close</i>
        </div>
      </form>
			 		 <div class="panel-footer">
<ul class="collection">
 @foreach ($unidades as $unidad)
    <!-- {!!var_dump($tipoSangre=tipoSangre($unidad->idGrupoSangre,
                                            $unidad->idFactorSangre))!!} -->
    <li class="collection-item avatar">
        <i class=" circle 
        @if ($unidad->idEstadoUnidad==1)
            {{$tipoSangre['color']}}
          @else
            black
        @endif
        ">{{$tipoSangre['nombre']}}</i>

        
        <span class="title">  Unidad #: {{$unidad->id}} </span>
        <p>         
          Vence:  {{substr($unidad->caduca,8,2)}}-{{substr($unidad->caduca,5,2)}}-{{substr($unidad->caduca,0,4)}}<br>
          Contenido: {{$unidad->contenido}}ml
        </p>
      <form class="form" role="form" method="POST" action="{{ url($mid.'/unidad/'.$unidad->id) }}">
      <div class="secondary-content">
        <a href="{{ url($mid.'/unidad/'.$unidad->id.'') }}" class=" btn-xs   blue-text waves-effect waves-blue transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Ver">
                              <i class="material-icons" style="  vertical-align: top;">
                                remove_red_eye
                              </i>
        </a>

                 {!! csrf_field() !!}   
<input type="text" name="_method" value="delete" hidden>
         <button class=" btn   red-text waves-effect waves-red transparent tooltipped" type="sumit" name="transaccion" 
         @if ($unidad->idEstadoUnidad==1)
          data-position="top" data-delay="50" data-tooltip="Inactivar">
            <i class="fa fa-trash" aria-hidden="true"></i>
         @endif
         @if ($unidad->idEstadoUnidad==2)
          data-position="top" data-delay="50" data-tooltip="Re-Activar">
            <i class="fa fa-undo" aria-hidden="true"></i>
         @endif

         </button>
      </div>
</form>
    </li>
  @endforeach     
  </ul>
			 		 </div>
			 	</div>
<div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
    <a class="btn-floating btn-large red tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nuevo" href="{{ url($mid.'/unidad/create') }}">

    	<i class="fa fa-plus"></i>
    </a>
    
  </div>

@endsection
