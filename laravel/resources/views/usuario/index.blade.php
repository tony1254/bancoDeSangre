@extends('layouts.app')
@section('title') {{'Catalogo de usuarios'}}@stop

@section('content')

<div class="panel panel-default"  id="ver">
<script type="text/javascript">
            $(document).on('ready',function(){

	 $('#busqueda').toggle();

	});
</script>
		        <div id="titulo" class="panel-body" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').focus();">Catalogo de usuarios<i class="material-icons right">search</i></div>
  
      <form id="busqueda" class="form" role="form" method="get" action="{{ url($mid.'/usuario') }}">
        <div class="input-field">        
          <input class="input-field" id="search" name="search" type="search" required placeholder="Ingrese Nombre,Apellido o DPI">
          <label for="search"></label>
          <i class="material-icons" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').val('');">close</i>
        </div>
      </form>
			 		 <div class="panel-footer">

  <ul class="collection">

@foreach ($usuarios as $usuario)
    
    <li class="collection-item avatar">
    
     <a href="{{ url($mid.'/usuario/'.$usuario->id.'') }}" 
                class=" usub  circle white-text waves-effect waves-light
                  blue accent-{{4-$usuario->rol}}
                 ">
        <div class="row text-center" >
          <div style="line-height:40px" >
            <font size="4.5">
              {{substr(App\CRol::find($usuario->rol)->nombre,0,1)}}
            </font>
          </div>
        </div>        
        </a>
      <span class="title">{{$usuario->name}}</span>
      <p>{{substr($usuario->cui , 0, 4)}}-{{substr($usuario->cui , 4, 5)}}-{{substr($usuario->cui , 9, 4)}}
      	<br>
      	<em>{{$usuario->email}}</em>
      </p>
      <div class="secondary-content">
           <a href="{{ url($mid.'/usuario/'.$usuario->id.'') }}" class=" btn-xs   blue-text waves-effect waves-blue transparent">
                              <i class="material-icons" style="  vertical-align: top;">
                                remove_red_eye
                              </i>
        </a>
       <a href="{{ url($mid.'/usuario/'.$usuario->id.'/edit') }}" class=" btn-xs   amber-text waves-effect waves-yellow transparent">
									        <i class="material-icons" style="  vertical-align: top;">
									        	create
									        </i>
      </div>
		</a>
    </li>

 @endforeach
 <div class="text-center">
@if(empty($busqueda))
	{!! $usuarios->links() !!} 
@else
	{!! $usuarios->appends(['search' => $busqueda])->links() !!} 
@endif
 </div>

  </ul>	
			 		 </div>
			 	</div>
<div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
    <a class="btn-floating btn-large red tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nuevo" href="{{ url($mid.'/usuario/create') }}">

    	<i class="fa fa-plus"></i>
    </a>
    
  </div>

@endsection
