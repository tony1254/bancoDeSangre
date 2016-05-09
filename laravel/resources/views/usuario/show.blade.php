@extends('layouts.app')
@section('title') {{'Catalogo de Personas'}}@stop

@section('content')

<div class="panel panel-default " id="ver" >
  
            <div class="panel-heading" >Usuario</div>
            <div class="panel-body">
             
        
          <b>Nombre de Usuario:</b> {{$usuario->name}}
          <br>
                    
          <b>CUI:</b> {{substr($usuario->cui , 0, 4)}}-{{substr($usuario->cui , 4, 5)}}-{{substr($usuario->cui , 9, 4)}}
          <br>
          <b>Email: </b>{{$usuario->email}}
          <br>
          <b>Rol:</b> {{App\CRol::find($usuario->rol)->nombre}}
        </div>
        
  
      </div>

  
          
  <div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
      
      <a class="btn btn-floating btn-fab amber  darken-3 waves-effect waves-light tooltipped
                @if (count($usuario)==0)
                disabled
                @endif
              "  data-position="left" data-delay="50" data-tooltip="Editar usuario" href="{{ url('/'.$mid.'/usuario/'.$usuario->id.'/edit') }}"><i class="material-icons">create</i></a>
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


  
  			 	