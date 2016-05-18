@extends('layouts.app')

@section('content')
<script type="text/javascript">
{{$e=App\TTransaccion::where('idTipoTransaccion',1)->count()}}//entrada
{{$s=App\TTransaccion::where('idTipoTransaccion',2)->count()}}//salida
{{$p=App\TTransaccion::where('idTipoTransaccion',3)->count()}}//precesado


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
    <h4 >Unidades de Sangre</h4>
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
            {{$e}},
            {{$s}},
            {{$p}}
        ],
        backgroundColor: [
            "#4caf50",
            "#f44336",
            "black"
        ],
        label: 'Unidades De Sangre' // for legend
    }],
    labels: [
        "Donacion",
        "Retiro",
        "Procesadas"
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
