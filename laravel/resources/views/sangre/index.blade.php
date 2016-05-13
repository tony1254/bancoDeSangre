@extends('layouts.app')
@section('title') {{'Catalogo de usuarios'}}@stop

@section('content')

<div class="panel panel-default"  id="ver">
<script type="text/javascript">
            $(document).on('ready',function(){

	 $('#busqueda').toggle();

	});
</script>
		        <div id="titulo" class="panel-body" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').focus();">Catalogo de Sangre<i class="material-icons right">search</i></div>
  
      <form id="busqueda" class="form" role="form" method="get" action="{{ url($mid.'/sangre') }}">
        <div class="input-field">        
          <input class="input-field" id="search" name="search" type="search" required placeholder="Ingrese Nombre,Apellido o DPI">
          <label for="search"></label>
          <i class="material-icons" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').val('');">close</i>
        </div>
      </form>
			 		 <div class="panel-footer">

  <ul class="collection">

@foreach ($sangres as $sangre)
    
    <li class="collection-item avatar">
    <!-- {!!var_dump($tipoSangre=tipoSangre($sangre->idGrupoSangre,$sangre->idFactorSangre))!!} -->
      <i class="circle {{$tipoSangre['color']}} ">{{$tipoSangre['nombre']}}</i>
      <span class="title">{{App\CAlmacen::find($sangre->idAlmacen)->nombre}}</span>
      <div >
        <div class="col-sm-4">
          Sangre Total: {{$sangre->sangreTotal}}@if ($sangre->sangreTotal<$sangre->minimo)<font color="red">&nbsp Niveles Bajos</font>@endif
        </div>
        <div class="col-sm-4">
          Hematíes: {{$sangre->hematies}}@if ($sangre->hematies<$sangre->minimo)<font color="red">&nbsp Niveles Bajos</font>@endif
        </div>        
      </div>
        <div >
          <div class="col-sm-4">
            Plaquetas: {{$sangre->plaquetas}}@if ($sangre->plaquetas<$sangre->minimo)<font color="red">&nbsp Niveles Bajo</font>@endif
          </div>
          <div class="col-sm-4">
            Plasma: {{$sangre->plasma}}@if ($sangre->plasma<$sangre->minimo)<font color="red">&nbsp Niveles Bajos</font>@endif
          </div>
          <div class="col-sm-4">
          	Cuarentena: {{$sangre->cuarentena}}
          </div>
        </div>
      <div class="secondary-content">
           <!-- <a href="{{ url($mid.'/sangre/'.$sangre->id.'') }}" class=" btn-xs   blue-text waves-effect waves-blue transparent">
                              <i class="material-icons" style="  vertical-align: top;">
                                remove_red_eye
                              </i>
                   </a> -->
       <a href="{{ url($mid.'/sangre/'.$sangre->id.'/edit') }}" class=" btn-xs   amber-text waves-effect waves-yellow transparent tooltipped" data-position="left" data-delay="50" data-tooltip="Cambiar Minimo">
									        <i class="material-icons" style="  vertical-align: top;">
									        	create
									        </i>
      </div>
		</a>
    </li>

 @endforeach
 <div class="text-center">
@if(empty($busqueda))
	{!! $sangres->links() !!} 
@else
	{!! $sangres->appends(['search' => $busqueda])->links() !!} 
@endif
 </div>

  </ul>	
			 		 </div>
			 	</div>
<!-- <div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
    <a class="btn-floating btn-large red tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nuevo" href="{{ url($mid.'/sangre/create/minimo') }}">

      <i class="fa fa-plus"></i>
    </a>
    
  </div> -->

@endsection
