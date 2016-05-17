@extends('layouts.app')

@section('content')
<script type="text/javascript">
{{$s41=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',4)->where('idEstadoUnidad',1)->count()}}
{{$s42=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',4)->where('idEstadoUnidad',2)->count()}}
{{$s11=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',1)->where('idEstadoUnidad',1)->count()}}
{{$s12=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',1)->where('idEstadoUnidad',2)->count()}}
{{$s21=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',2)->where('idEstadoUnidad',1)->count()}}
{{$s22=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',2)->where('idEstadoUnidad',2)->count()}}
{{$s31=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',3)->where('idEstadoUnidad',1)->count()}}
{{$s32=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',3)->where('idEstadoUnidad',2)->count()}}
$( document ).ready(function() {
  $("#container").radialPieChart("init", {
  'font-size': 1,
  'fill': 50,
  'data': [
    {'color': "#f44336    ", 'perc':  {{$s41}}+12 },
    {'color': "#e57373    ", 'perc':  {{$s42}}+12 },
    {'color': "#2196f3   ", 'perc':   {{$s11}}+12 },
    {'color': "#1565c0    ", 'perc':  {{$s12}}+12 },
    {'color': "#ffc107   ", 'perc':   {{$s21}}+12 },
    {'color': "#ff6f00    ", 'perc':  {{$s22}}+12 },
    {'color': "#4caf50   ", 'perc':   {{$s31}}+12 },
    {'color': "#2e7d32   ", 'perc':   {{$s32}}+12 }
  ]
  });
});

function imprimir(){
  $("#grafica").printThis();
}
</script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Menu de Reportes</div>
                <div class="panel-body">


<div class="row" id="grafica">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <div id="container"></div>
  </div>
  <div class="col-sm-4">
    PErsonas
    <li>
    <i class="fa fa-circle red-text" aria-hidden="true"></i>
    O+ &nbsp&nbsp =&nbsp&nbsp {{$s41}}
</li>
    <li>
    <i class="fa fa-circle red-text text-lighten-2" aria-hidden="true"></i>
    O- &nbsp&nbsp&nbsp =&nbsp&nbsp {{$s42}}
</li>
    <li>
    <i class="fa fa-circle blue-text" aria-hidden="true"></i>
    A+ &nbsp&nbsp =&nbsp&nbsp {{$s11}}
</li>
    <li>
    <i class="fa fa-circle blue-text text-darken-3" aria-hidden="true"></i>
    A- &nbsp&nbsp&nbsp =&nbsp&nbsp {{$s12}}
</li>
    <li>
    <i class="fa fa-circle amber-text" aria-hidden="true"></i>
    B+&nbsp&nbsp&nbsp =&nbsp&nbsp {{$s21}} 
</li>
    <li>
    <i class="fa fa-circle amber-text text-darken-3" aria-hidden="true"></i>
    B-&nbsp&nbsp&nbsp&nbsp =&nbsp&nbsp {{$s22}} 
</li>
    <li>
    <i class="fa fa-circle green-text" aria-hidden="true"></i>
    AB+&nbsp = &nbsp&nbsp{{$s31}} 
</li>
    <li>
    <i class="fa fa-circle green-text text-darken-3" aria-hidden="true"></i>
    AB- &nbsp = &nbsp&nbsp{{$s32}} 
</li>
  </div>
  
</div>

<div class="panel-body text-center">
  <a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/rptPersona') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Reporte de Donantes</a>
<a class="btn teal white-text waves-effect waves-light" href="javascript:void(0)" id="imprime" Onclick="imprimir()"><i class="fa fa-print" aria-hidden="true"></i></a>
</div>





                </div>
<div class="panel-footer" id="footer">
Zona que se imprimirá
</div>
<div class="row text-center">
  <div class="preloader-wrapper big active " id="carga" style="display">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

//Funcion para cargar el reporte

function rptPersona(){
  $( '#ver2' ).toggle();
  $('#carga').show();
  $( '#test2' ).load( '{{ url(mid().'/reportes?msj=hola') }}' );

}
</script>

            </div>
        </div>
    </div>
</div>
@endsection
