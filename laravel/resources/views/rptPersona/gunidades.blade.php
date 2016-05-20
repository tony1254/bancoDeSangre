@extends('layouts.app')
@section('title') {{'Grafica de Unidades'}}@stop

@section('content')
<script type="text/javascript">
{{$s41=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',4)->where('idEstadoUnidad',1)->count()}}
{{$s42=App\TUnidad::where('idFactorSangre',2)->where('idGrupoSangre',4)->where('idEstadoUnidad',1)->count()}}
{{$s11=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',1)->where('idEstadoUnidad',1)->count()}}
{{$s12=App\TUnidad::where('idFactorSangre',2)->where('idGrupoSangre',1)->where('idEstadoUnidad',1)->count()}}
{{$s21=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',2)->where('idEstadoUnidad',1)->count()}}
{{$s22=App\TUnidad::where('idFactorSangre',2)->where('idGrupoSangre',2)->where('idEstadoUnidad',1)->count()}}
{{$s31=App\TUnidad::where('idFactorSangre',1)->where('idGrupoSangre',3)->where('idEstadoUnidad',1)->count()}}
{{$s32=App\TUnidad::where('idFactorSangre',2)->where('idGrupoSangre',3)->where('idEstadoUnidad',1)->count()}}

function imprimir(){
  window.print();
}
</script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Reportes</div>
                <div class="panel-body " id="grafica">


<div class="row" >
  <div class="col-sm-4"></div>
  <div class="text-center">
    <h4 >Unidades </h4>
<canvas id="myChart"></canvas>
  </div>
  
  
  
</div>

<div class="panel-body text-center">
  <a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/reportes') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Menu de Reportes</a>
  <a class="btn blue white-text waves-effect waves-light" href="javascript:void(0)" onclick="imprimir()"><i class="fa fa-print" aria-hidden="true"></i></a>
  
</div>





                </div>



<script>
var ctx = document.getElementById("myChart");
var data = {
    datasets: [{
        data: [
            {{$s41}},
            {{$s42}},
            {{$s11}},
            {{$s12}},
            {{$s21}},
            {{$s22}},
            {{$s31}},
            {{$s42}}
        ],
        backgroundColor: [
            "#f44336",
            "#e57373",
            "#2196f3",
            "#1565c0",
            "#ffc107",
            "#ff6f00",
            "#4caf50",
            "#2e7d32"
        ],
        label: 'Unidades De Sangre' // for legend
    }],
    labels: [
        "O+",
        "O-",
        "A+",
        "A-",
        "B+",
        "B-",
        "AB+",
        "AB-"
    ]
};
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>                




            </div>
        </div>
    </div>
</div>
@endsection
