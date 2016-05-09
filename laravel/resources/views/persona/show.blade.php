@extends('layouts.app')
@section('title') {{'Catalogo de Personas'}}@stop

@section('content')
@if (isset($msj))
  <script type="text/javascript">
      function alerta(texto){

      Materialize.toast(texto, 5000, 'rounded') // 'rounded' is the class I'm applying to the toast
      }

  </script>
          <script type="text/javascript">
              alerta('{{$msj}}');
          </script>
@endif
<div class="panel panel-default" id="ver2">
            <div class="panel-heading">Persona</div>
            <div class="panel-body">
            @if (count($persona)==0)
              Aun no hay Persona Vinculada
            @else

<!-- {{$mid=mid()}} -->

            <script type="text/javascript">
              function editarper(){
            $( '#ver2' ).toggle();
            $('#carga').show();
            $( '#test4' ).load( '\\{{$mid}}/personas/{{$persona->id}}/edit' );
          }
            </script>
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
          
            @endif

          </div>
      <div class="panel-footer">
      Afecciones
          
        </div>
      <div id="afeecion">
            <div class="col-xs-3 col-xs-offset-9">
              <a id="boton"class="btn btn-floating btn-fab-mini green  darken-3 waves-effect waves-light tooltipped
                @if (count($persona)==0)
                disabled
                @endif
              "data-position="left" data-delay="0" data-tooltip="Agregar afecciones a Persona"  onclick="afeccoiAdd()"><i class="material-icons "style="  vertical-align: top;" >add</i></a>
          </div>
          @if (count($afecciones)>0)
            <table class=" table table-hover table-responsive table-condensed">
              <tr><th width="150">Afecciones</th><th>Acciones</th></tr>
              @foreach ($afecciones as $afeccion)
                <tr>
                  <td width="150" style="  vertical-align: middle;"> {{App\CTipoAfeccion::find($afeccion->idTipoAfeccion)->nombre}}</td>
                  <td width="350" >
                  <form class="form" role="form" method="POST" action="{{ url($mid.'/persona/'.$persona->id.'/afeccionEliminar/'.$afeccion->id) }}">
                        {!! csrf_field() !!}
                  <input type="text" name="_method" value="DELETE" hidden>
                      <button class="btn btn-floating btn-fab-mini red  darken-3 waves-effect waves-light tooltipped"
                      data-position="left" data-delay="50" data-tooltip="Eliminar" type="sumit">
                          <i class="material-icons"   style="  vertical-align: top;">delete_forever</i>
                      </button>
                  </form>
                  </td>
                </tr>
              @endforeach
            </table>
          @endif
      </div>
        <script type="text/javascript">
          function afeccoiAdd(){
        $('.tooltipped').tooltip('remove');

$( '#afeecion' ).load( '{{ url($mid.'/persona/'.$persona->id.'/afeccionAdd ') }}' );
          }
        </script>
</div>

  
  			 	
  <div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
      
      <a class="btn btn-floating btn-fab amber  darken-3 waves-effect waves-light tooltipped
                @if (count($persona)==0)
                disabled
                @endif
              "  data-position="left" data-delay="50" data-tooltip="Editar Persona" href="{{ url('/'.$mid.'/persona/'.$persona->id.'/edit') }}"><i class="material-icons">create</i></a>
    </div>

  

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
