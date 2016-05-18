@extends('layouts.app')
@section('title') {{'Reporte de Donantes'}}@stop

@section('content')

<div class="panel panel-default"  id="ver">
<script type="text/javascript">


function imprime(){
  
    $("#footer").printThis();
}
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
  
      <form id="busqueda" class="form" role="form" method="get" action="{{ url($mid.'/rptPersona') }}">
        <div class="input-field">   
<div class="text-right" Onclick="limpiar()">
  <a class="material-icons btn-xs   grey-text waves-effect waves transparent" >close</a>
</div>
<div class="table-responsive">
  
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
</div>
<div class="row">
  <div class="col-xs-9">
    
          <input class="input-field" id="search" name="search" type="search"  placeholder="Ingrese Nombre,Apellido o DPI"> 

  </div>
  <div class="col-xs-3">
          <button type="sumit" class="btn teal white-text waves-effect waves-light tooltipped"  data-position="top" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search fa-2x" aria-hidden="true" ></i>
                  </button>
    
  </div>
</div>

        </div>
      </form>
<div class="text-right grey lighten-3 ">
  <a class="btn blue white-text waves-effect waves-light" href="javascript:void(0)" onclick="imprime()"><i class="fa fa-print" aria-hidden="true"></i></a>
</div>
<div class="panel-footer" id="footer">
<div class="table-responsive">
  <h4>Reporte de Donantes</h4>
  <table class="table table-condensed table-bordered table-striped table-responsive">
  <tr>
    <th width="6">CUI</th>
    <th width="3">Nombre</th>
    <th width="1">Tipo de Sangre</th>
    <th width="1">Telefono 1</th>
    <th width="1">Telefono 2</th>
    <th width="3">Email</th>
    <th width="1">estado</th>
  </tr>

  @foreach ($personas as $persona)
    <!-- {!!var_dump($tipoSangre=tipoSangre($persona->grupoSangre,$persona->factorSangre))!!} -->
  <tr >
      <td width="120">{{substr($persona->cui , 0, 4)}}-{{substr($persona->cui , 4, 5)}}-{{substr($persona->cui , 9, 4)}}</td>
      <td width="200">{{$persona->nombre.' '.$persona->apellido}}</td>
      <td width="20">{{$tipoSangre['nombre']}}</td>
      <td width="5">{{$persona->telefono1}}</td>
      <td width="5">{{$persona->telefono2}}</td>
      <td width="30">{{$persona->email}}</td>
      <td width="5">
      @if ($persona->estado!=1)
        <i class="fa fa-times-circle fa-2x red-text" aria-hidden="true"></i>
        @else
        <i class="fa fa-check-circle fa-2x green-text" aria-hidden="true"></i>
      @endif</td>
  </tr>
 

    

 @endforeach
</table> 
<i class="fa fa-times-circle fa-2x red-text" aria-hidden="true"></i> = No Apto 
<i class="fa fa-check-circle fa-2x green-text" aria-hidden="true"></i> = Apto
</div>
           </div>
           <div class="text-center">
           


@if(empty($busqueda)&&!isset($wsexo)&&!isset($wfactorSangre)&&!isset($wgrupoSangre)&&!isset($wminima)&&!isset($wmaxima))
  {!! $personas->links() !!} 
@else
  {!! $personas->appends(['sexo' => $wsexo])->appends(['factorSangre' => $wfactorSangre])->appends(['grupoSangre' => $wgrupoSangre])->appends(['minima' => $wminima])->appends(['maxima' => $wmaxima])->appends(['search' => $busqueda])->links() !!} 
@endif
 </div>
        </div>


@endsection

