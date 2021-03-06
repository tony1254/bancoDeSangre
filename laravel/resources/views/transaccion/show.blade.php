@extends('layouts.app')
@section('title') {{'Transaccion #'.$transaccion->id}}@stop

@section('content')

<div class="panel panel-default" id="ver2">
            <div class="panel-heading">Transaccion #. <b>{{$transaccion->id}}</b></div>
            <div class="panel-body">
            <div class="row">
              <div class="col-sm-6">
                
            @if (count($persona)==0)
              Aun no hay Persona Vinculada
            @else



            <script type="text/javascript">
              function editarper(){
            $( '#ver2' ).toggle();
            $('#carga').show();
            $( '#test4' ).load( '\\{{$mid}}/personas/{{$persona->id}}/edit' );
          }
            </script>

         
<b>
@if ($transaccion->idTipoTransaccion==1||$transaccion->idTipoTransaccion==3)
  Donador
@endif @if ($transaccion->idTipoTransaccion==2)
  Paciente
@endif
</b>
<hr style="width: 100%; color: black; height: 1px; background-color:black;" />
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
          
            @endif

              </div>
              <div class="col-sm-6">
<b>Receptor del Banco de Sangre</b>
<hr style="width: 100%; color: black; height: 1px; background-color:black;" />                
          <b>Nombre de Usuario:</b> {{$usuario->name}}
          <br>
                    
          <b>CUI:</b> {{substr($usuario->cui , 0, 4)}}-{{substr($usuario->cui , 4, 5)}}-{{substr($usuario->cui , 9, 4)}}
          <br>
          <b>Email: </b>{{$usuario->email}}
          <br>
          <b>Rol:</b> {{App\CRol::find($usuario->rol)->nombre}}
          <br>
          <br>
          <br>
               
<b>Transaccion</b>
<hr style="width: 100%; color: black; height: 1px; background-color:black;" />                       
          <b>Fecha de Creacion:</b> {{$transaccion->created_at}}
          <br>
             
              </div>
            </div>
          </div>
<div class="row">
  <div class="col-sm-12">
    
<b>Detalle</b>
<hr style="width: 100%; color: black; height: 1px; background-color:black;" />  

  <ul class="collection">
 @foreach ($detalles as $detalle)
        <!-- {{$unidad=App\TUnidad::find($detalle->idUnidad)}} -->
    <!-- {!!var_dump($tipoSangre=tipoSangre($unidad->idGrupoSangre,
                                            $unidad->idFactorSangre))!!} -->
    <li class="collection-item avatar">
        <a href="{{ url($mid.'/unidad/'.$unidad->id.'') }}" 
                class=" usub  circle white-text waves-effect waves-light
            @if ($unidad->idEstadoUnidad==1)
              {{$tipoSangre['color']}}
            @else
            @if ($unidad->idEstadoUnidad==3)
                deep-purple darken-2
              @else
              @if ($unidad->idEstadoUnidad==4)
                  lime darken-4
                @else
                  black
              @endif
            @endif
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
        
        <span class="title">  Unidad #: {{$detalle->idUnidad}} </span>
        <p>         
          Vence:  {{substr($unidad->caduca,8,2)}}-{{substr($unidad->caduca,5,2)}}-{{substr($unidad->caduca,0,4)}}<br>
          Contenido: {{$unidad->contenido}}ml
        </p>
<form class="form" role="form" method="POST" action="{{ url($mid.'/unidad/'.$unidad->id) }}">
      <div class="secondary-content">
        <a href="{{ url($mid.'/unidad/'.$detalle->idUnidad.'') }}" class=" btn-xs   blue-text waves-effect waves-blue transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Ver">
                              <i class="material-icons" style="  vertical-align: top;">
                                remove_red_eye
                              </i>
        </a>

                 {!! csrf_field() !!}   
<input type="text" name="_method" value="delete" hidden>
         <button class=" btn   red-text waves-effect waves-red transparent tooltipped" type="sumit" name="transaccion" value="{{$detalle->idTransaccion}}"
         @if ($unidad->idEstadoUnidad==1)
          data-position="top" data-delay="50" data-tooltip="Inactivar">
            <i class="fa fa-trash" aria-hidden="true"></i>
         @endif
         @if ($unidad->idEstadoUnidad==2)
          data-position="top" data-delay="50" data-tooltip="Inactivar">
            <i class="fa fa-undo" aria-hidden="true"></i>
         @endif
         @if ($unidad->idEstadoUnidad>2)
          data-position="top" data-delay="50" data-tooltip="Escondido" style="display:none">
         @endif
         </button>
      </div>
</form>         
    </li>
  @endforeach     
  </ul>   
  </div>
</div>
      <div class="panel-footer">
      Afecciones
          
        </div>
    
        <script type="text/javascript">
          function afeccoiAdd(){
        $('.tooltipped').tooltip('remove');

$( '#afeecion' ).load( '{{ url($mid.'/persona/'.$persona->id.'/afeccionAdd ') }}' );
          }
        </script>
</div>

  
  			 	
  <!-- <div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
      
      <a class="btn btn-floating btn-fab amber  darken-3 waves-effect waves-light tooltipped
                @if (count($persona)==0)
                disabled
                @endif
              "  data-position="left" data-delay="50" data-tooltip="Editar Persona" href="{{ url('/'.$mid.'/persona/'.$persona->id.'/edit') }}"><i class="material-icons">create</i></a>
    </div> -->

  

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
