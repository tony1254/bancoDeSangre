@extends('layouts.app')
@section('title') {{'Transaccion Creacion'}}@stop

@section('content')


  
<form class="form" role="form" method="POST" action="{{ url($mid.'/transaccion/create/storeRetiro') }}">
                 {!! csrf_field() !!}
<div class="panel panel-default"  id="ver">
            <div class="panel-heading"> Creacion Nuevo Retiro</div>
              <div class="panel-body">
              <b>Nombre:</b>
          {{$persona->nombre.' '.$persona->apellido}}
          <br>
          <b>CUI:</b>
          {{substr($persona->cui , 0, 4)}}-{{substr($persona->cui , 4, 5)}}-{{substr($persona->cui , 9, 4)}}
          <br>
          <b>Email:</b>
          {{$persona->email}}
          <br>
          <b>Fecha de Nacimiento:</b>
          {{substr($persona->fechaNacimiento,8,2)}}-{{substr($persona->fechaNacimiento,5,2)}}-{{substr($persona->fechaNacimiento,0,4)}}
          <br>
          <b>Sexo:</b>
          {{App\CSexo::find(($persona->sexo))->nombre}}
          <br>
          
          <b>Tipo de Sangre:</b>
          {{tipoSangre($persona->grupoSangre,$persona->factorSangre)['nombre']}}
          <br>
          <b>Vecindad:</b>
          {{$persona->vecindad}}
          <br>
          <b>Telefono 1:</b>
          {{$persona->telefono1}}
          <br>
          <b>Telefono 2:</b>
          {{$persona->telefono2}}
          <br>
          <b>Peso:</b>
          {{$persona->peso}}Kg
          <br>
          <b>Estado:</b>
          @if ($persona->estado==1)
              <font color="green">
               <b>
                  Puede Donar Sangre
               </b>
              </font>
            @else
            <font color="red">
               <b>
                  NO Puede Donar Sangre
               </b>
              </font>
          @endif
<input type="text" value="{{$persona->id}}" id="persona" name="persona"  hidden="">
<div class="input-field col s6">  
                            
                              <div class="col-sm-2"><br><br>
                                Almacen:
                              </div>
                              <div class="col-sm-4">
                                
                          <select class="form-control" name="almacen" id="almacen">
                          @foreach ($almacenes as $almacen)
                            <option value="{{$almacen->id}}">{{$almacen->nombre}}</option>
                          @endforeach
                          </select>
                              </div>
                              <div class="col-sm-2"><br><br>
                                Congelador:
                              </div>
                              <div class="col-sm-4">
                                
                          <select class="form-control" name="congelador" id="congelador">
                          @foreach ($congeladores as $congelador)
                            <option value="{{$congelador->id}}">{{$congelador->nombre}}</option>
                          @endforeach
                          </select>
                              </div>
                            
                        </div>
<div class="input-field col s6">  
                              <div class="col-sm-2"><br><br>
                                Hemoderivado:
                              </div>
                              <div class="col-sm-4">
                                
                          <select class="form-control" name="hemoderivado" id="hemoderivado">
                          @foreach ($hemoderivados as $hemoderivado)
                            <option value="{{$hemoderivado->id}}">{{$hemoderivado->nombre}}</option>
                          @endforeach
                          </select>
                              </div>
                            
                        </div>                        
<style type="text/css">

[type="radio"]:checked + label:after,
[type="radio"].with-gap:checked + label:before,
[type="radio"].with-gap:checked + label:after {
  border: 2px solid #ff3d00;
}

[type="radio"]:checked + label:after,
[type="radio"].with-gap:checked + label:after {
  background-color: #ff3d00;
  z-index: 0;
}
</style>
<div class="col-sm-4">

   <table class="table table-condensed table-bordered ">
      <tr  >
        <th ROWSPAN="2" width="20%" class="text-center">Grupo de Sangre</th>
        <th colSPAN="2" width="10%" class="text-center">factor </th>
        <th ROWSPAN="2" width="60%" class="text-center" style="  vertical-align: middle;">Cantidad</th>
      </tr>
      <tr>
        <th class="text-center">+</th>
        <th class="text-center">-</th>
      </tr>
@if ($persona->grupoSangre==1||$persona->grupoSangre==3)
      <tr>
        <td width="10%" class="text-center">
          A
        </td>
        <td width="5%" class="text-center">
          <div  style="width:50px; height:20px; margin:1px; " >
            <input name="factor" type="radio" id="test1"  value="1"
@if ($persona->factorSangre==2)
  disabled
@endif
             />
            <label for="test1"></label>
          </div>
        </td>
        <td width="5%">
          <div  style="width:50px; height:20px; margin:1px; " >
            <input name="factor" type="radio" id="test2"  value="2"/>
            <label for="test2"></label>
          </div>
        </td>
        <td width="60%">
          <input  style="width:50px; height:20px; margin:1px; " type="number"  name="cantidadA" class="ss">unidades
        </td>
      </tr>
@endif
@if ($persona->grupoSangre==2||$persona->grupoSangre==3)
      <tr>
        <td width="10%" class="text-center">
          B
        </td>
        <td width="5%" class="text-center">
          <div  style="width:50px; height:20px; margin:1px; " >
            <input name="factor" type="radio" id="test3" value="3"
@if ($persona->factorSangre==2)
  disabled
@endif
             />
            <label for="test3"></label>
          </div>
        </td>
        <td width="5%">
          <div  style="width:50px; height:20px; margin:1px; " >
            <input name="factor" type="radio" id="test4" value="4" />
            <label for="test4"></label>
          </div>
        </td>
        <td width="60%">
          <input  style="width:50px; height:20px; margin:1px; " type="number" name="cantidadB" class="ss">unidades
        </td>
      </tr>
@endif
@if ($persona->grupoSangre==3||$persona->grupoSangre==3)
      <tr>
        <td width="10%" class="text-center">
          AB
        </td>
        <td width="5%" class="text-center">
          <div  style="width:50px; height:20px; margin:1px; " >
            <input name="factor" type="radio" id="test5"  value="5"
@if ($persona->factorSangre==2)
  disabled
@endif
             />
            <label for="test5"></label>
          </div>
        </td>
        <td width="5%">
          <div  style="width:50px; height:20px; margin:1px; " >
            <input name="factor" type="radio" id="test6" value="6" />
            <label for="test6"></label>
          </div>
        </td>
        <td width="60%">
          <input  style="width:50px; height:20px; margin:1px; " type="number" name="cantidadAB" class="ss">unidades
        </td>
      </tr>
@endif
@if ($persona->grupoSangre==4||$persona->grupoSangre==3)
      <tr>
        <td width="10%" class="text-center">
          O
        </td>
        <td width="5%" class="text-center">
          <div class="red-text" style="width:50px; height:20px; margin:1px; " >
            <input   name="factor" type="radio" id="test7" value="7" 
@if ($persona->factorSangre==2)
  disabled
@endif
             />
            <label for="test7"></label>
          </div>
        </td>
        <td width="5%">
          <div  style="width:50px; height:20px; margin:1px; " >
            <input name="factor" type="radio" id="test8" value="8" />
            <label for="test8"></label>
          </div>
        </td>
        <td width="60%">
          <input  style="width:50px; height:20px; margin:1px; " type="number" name="cantidadO" class="ss">unidades
        </td>
      </tr>
@endif

      
      
      
    </table> 
            
  
</div>

<a class="btn amber" Onclick="limpiar()">Limpiar</a>
<script type="text/javascript">
  function limpiar(){
$("input:radio").removeAttr("checked");
$(".ss").val('');
  };
</script>

           </div>
        </div>
<div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
    <button class="btn-floating btn-large green tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Grabar" type="submit">
      <i class="fa fa-floppy-o"></i>
    </button>
    
  </div>

</form>

  
          


  
</form>
      <script type="text/javascript">
      function verper(){
  
  
$( '#carga' ).show();
  $( '#ver2' ).toggle();

location.reload();
}
        $('#carga').toggle();
                $("#cui").mask("9999-99999-9999");
                $("#telefono1").mask("9999-9999");
                $("#telefono2").mask("9999-9999");

      </script>
@endsection
