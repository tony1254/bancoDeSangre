@extends('layouts.app')
@section('title') {{'Catalogo de Personas'}}@stop

@section('content')

<div class="panel panel-default"  id="ver">
<script type="text/javascript">
            $(document).on('ready',function(){

	 $('#busqueda').toggle();

	});
</script>
		        <div id="titulo" class="panel-body" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').focus();">Catalogo de Personas<i class="material-icons right">search</i></div>
  
      <form id="busqueda" class="form" role="form" method="get" action="{{ url($mid.'/persona') }}">
        <div class="input-field">        
          <input class="input-field" id="search" name="search" type="search" required placeholder="Ingrese Nombre,Apellido o DPI">
          <label for="search"></label>
          <i class="material-icons" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').val('');">close</i>
        </div>
      </form>
			 		 <div class="panel-footer">

  <ul class="collection">

@foreach ($personas as $persona)
    
    <li class="collection-item avatar">
    
    <!-- {!!var_dump($tipoSangre=tipoSangre($persona->grupoSangre,$persona->factorSangre))!!} -->

      <i class="circle
@if ($persona->estado==1)
    {{$tipoSangre['color']}}
  @else
    black
@endif
       ">{{$tipoSangre['nombre']}}</i>
      <span class="title">{{$persona->nombre.' '.$persona->apellido}}</span>
      <p>{{substr($persona->cui , 0, 4)}}-{{substr($persona->cui , 4, 5)}}-{{substr($persona->cui , 9, 4)}}
      	<br>
      	<em>{{$persona->email}}</em><b>/</b>{{$persona->telefono1}}
      </p>
      <div class="secondary-content">
        
           <a href="{{ url($mid.'/persona/'.$persona->id.'') }}" class=" btn-xs   blue-text waves-effect waves-blue transparent">
                              <i class="material-icons" style="  vertical-align: top;">
                                remove_red_eye
                              </i>
        </a>
        <a href="{{ url($mid.'/persona/'.$persona->id.'/edit') }}" class=" btn-xs   amber-text waves-effect waves-yellow transparent">
                              <i class="material-icons" style="  vertical-align: top;">
                                create
                              </i>
        </a>
      </div>
    </li>

 @endforeach
 <div class="text-center">
@if(empty($busqueda))
	{!! $personas->links() !!} 
@else
	{!! $personas->appends(['search' => $busqueda])->links() !!} 
@endif
 </div>
    <!-- <li class="collection-item avatar">
      <i class="material-icons circle green">insert_chart</i>
      <span class="title">Title</span>
      <p>First Line <br>
         Second Line
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
    <li class="collection-item avatar">
      <i class="material-icons circle red">play_arrow</i>
      <span class="title">Title</span>
      <p>First Line <br>
         Second Line
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li> -->
  </ul>	
			 		 </div>
			 	</div>
<div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
    <a class="btn-floating btn-large red tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nuevo" href="{{ url($mid.'/persona/create') }}">

    	<i class="fa fa-plus"></i>
    </a>
    
  </div>

@endsection
