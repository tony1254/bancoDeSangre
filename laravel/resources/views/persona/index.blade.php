@extends('layouts.app')
@section('title') {{'Catalogo de Personas'}}@stop

@section('content')

<div class="panel panel-default"  id="ver">
<script type="text/javascript">
            $(document).on('ready',function(){

	 $('#busqueda').toggle();

	});
function limpiar(){
  $('#titulo').toggle(); 
  $('#busqueda').toggle(); 
  $('#search').val('');
  $('#minima').val('');
  $('#maxima').val('');
  $('#sexo  option:contains("Seleccione Opcion")').prop('selected', true);
  $('#factorSangre  option:contains("Seleccione Opcion")').prop('selected', true);
  $('#grupoSangre  option:contains("Seleccione Opcion")').prop('selected', true);
};
</script>
		        <div id="titulo" class="panel-body" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').focus();">Catalogo de Personas<i class="material-icons right">search</i></div>
  
      <form id="busqueda" class="form" role="form" method="get" action="{{ url($mid.'/persona') }}">
        <div class="input-field">   
<div class="text-right" Onclick="limpiar()">
  <a class="material-icons btn-xs   grey-text waves-effect waves transparent" >close</a>
</div>
<table class="table table-condensed table-bordered table-striped">
  <tr>
    <th>Sexo</th>
    <th colspan="2" class="text-center">Tipo de Sangre</th>
    <th colspan="2" class="text-center">edad</th>
    
  </tr>
  <tr>
    <td>
      <select class="form-control" name="sexo" id="sexo">
        <option value="">Seleccione Opcion</option>
      @foreach (App\CSexo::all() as $sexo)
        <option value="{{$sexo->id}}">{{$sexo->nombre}}</option>
      @endforeach
      </select>
    </td>
    <td>
      <select class="form-control" name="grupoSangre" id="grupoSangre">
        <option value="">Seleccione Opcion</option>
      @foreach (App\CGrupoSangre::all() as $sexo)
        <option value="{{$sexo->id}}">{{$sexo->nombre}}</option>
      @endforeach
      </select>
    </td>
    <td>
      <select class="form-control" name="factorSangre" id="factorSangre">
        <option value="">Seleccione Opcion</option>
      @foreach (App\CFactorSangre::all() as $sexo)
        <option value="{{$sexo->id}}">{{$sexo->nombre}}</option>
      @endforeach
      </select>      
    </td>
    <td>minima
      <br>
      <input type="number" name="minima" id="minima">
    </td>
    <td>maxima
      <br>
      <input type="number" name="maxima" id="maxima">
    </td>
  </tr>
</table>     
<div class="row">
  <div class="col-sm-10">
    
          <input class="input-field" id="search" name="search" type="search"  placeholder="Ingrese Nombre,Apellido o DPI"> 

  </div>
  <div class="col-sm-2">
          <button type="sumit" class="btn teal white-text waves-effect waves-light tooltipped"  data-position="top" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search fa-2x" aria-hidden="true" ></i>
                  </button>
    
  </div>
</div>

        </div>
      </form>
			 		 <div class="panel-footer">

  <ul class="collection">

@foreach ($personas as $persona)
    
    <li class="collection-item avatar">
    
    <!-- {!!var_dump($tipoSangre=tipoSangre($persona->grupoSangre,$persona->factorSangre))!!} -->

      
       
       <a href="{{ url($mid.'/persona/'.$persona->id.'') }}" 
                class=" usub  circle white-text waves-effect waves-light
@if ($persona->estado==1)
    {{$tipoSangre['color']}}
  @else
    black
@endif
                 ">
        <div class="row text-center" >
          <div style="line-height:40px" >
            <font size="4.5">
            {{$tipoSangre['nombre']}}
            </font>
          </div>
        </div>        
        </a>
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

@if(empty($busqueda)&&!isset($wsexo)&&!isset($wfactorSangre)&&!isset($wgrupoSangre)&&!isset($wminima)&&!isset($wmaxima))
  {!! $personas->links() !!} 
@else
  {!! $personas->appends(['sexo' => $wsexo])->appends(['factorSangre' => $wfactorSangre])->appends(['grupoSangre' => $wgrupoSangre])->appends(['minima' => $wminima])->appends(['maxima' => $wmaxima])->appends(['search' => $busqueda])->links() !!} 
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
