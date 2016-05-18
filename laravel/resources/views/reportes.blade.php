@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Reportes</div>
                <div class="panel-body " id="grafica">


<div class="row" >
  <div class="col-sm-4"></div>
  <div class="text-center">
    <h4 >Reportes</h4>

  </div>
  
  
  
</div>

<div class="panel-body text-center">
  <a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/rptPersona') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Reporte de Donantes</a>
  <a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/gDonantes') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Grafica de Donantes</a>
  <a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/gUnidades') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Grafica de Unidades</a>
  <a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/gTransacciones') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Grafica de Transacciones</a>
  

</div>





                </div>



                




            </div>
        </div>
    </div>
</div>
@endsection
