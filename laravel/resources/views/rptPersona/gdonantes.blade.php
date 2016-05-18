@extends('layouts.app')
@section('title') {{'Grafica de Donantes'}}@stop

@section('content')

<script type="text/javascript">
{{$s41=App\Persona::where('factorSangre',1)->where('grupoSangre',4)->where('estado',1)->count()}}
{{$s42=App\Persona::where('factorSangre',2)->where('grupoSangre',4)->where('estado',1)->count()}}
{{$s11=App\Persona::where('factorSangre',1)->where('grupoSangre',1)->where('estado',1)->count()}}
{{$s12=App\Persona::where('factorSangre',2)->where('grupoSangre',1)->where('estado',1)->count()}}
{{$s21=App\Persona::where('factorSangre',1)->where('grupoSangre',2)->where('estado',1)->count()}}
{{$s22=App\Persona::where('factorSangre',2)->where('grupoSangre',2)->where('estado',1)->count()}}
{{$s31=App\Persona::where('factorSangre',1)->where('grupoSangre',3)->where('estado',1)->count()}}
{{$s32=App\Persona::where('factorSangre',2)->where('grupoSangre',3)->where('estado',1)->count()}}
{{$se=App\Persona::where('estado',0)->count()}}

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
    <h4 >Donantes</h4>
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
            {{$s42}},
            {{$se}}
        ],
        backgroundColor: [
            "#f44336",
            "#e57373",
            "#2196f3",
            "#1565c0",
            "#ffc107",
            "#ff6f00",
            "#4caf50",
            "#2e7d32",
            "black"
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
        "AB-",
        "No Aptos"
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
