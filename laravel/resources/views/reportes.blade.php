@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Menu de Reportes</div>

                <div class="panel-body">
                  
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
      <input type="number" name="minima">
    </td>
    <td>maxima
      <br>
      <input type="number" name="maxima">
    </td>
  </tr>
</table>
                  <a href="{{ url(mid().'/resporte/') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Generar Reporte
                  </a>
<a class="btn" href="javascript:void(0)" id="imprime">Imprime</a>

                </div>
<div class="panel-footer" id="footer">
Zona que se imprimirá
</div>

<script type="text/javascript">
$("#imprime").click(function (){
  $("#footer").printThis();
})
</script>

            </div>
        </div>
    </div>
</div>
@endsection
