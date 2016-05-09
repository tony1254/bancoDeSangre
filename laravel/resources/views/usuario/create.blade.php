@extends('layouts.app')
@section('title') {{'Catalogo de usuarios'}}@stop

@section('content')
@if ($errors->has())
  <script type="text/javascript">
      function alerta(texto){

      Materialize.toast(texto, 5000, 'rounded') // 'rounded' is the class I'm applying to the toast
      }

  </script>

      
      @foreach ($errors->all() as $error)
          <script type="text/javascript">
              alerta('{{ $error }}');
          </script>
           @endforeach

@endif
<div class="panel panel-default"  id="ver">

            <div id="titulo" class="panel-heading">Creacion de usuario</div>
            <div id="titulo" class="panel-body">
<form class="form" role="form" method="POST" action="{{ url($mid.'/usuario/') }}">
                        {!! csrf_field() !!}
                  <div class="row " >
  <div class="input-field col s6">
                  <input id="nombre" name="nombre" type="text" class="validate" value="" required
                 pattern=".{0}|.{4,}" title="Debe contener un minimo de 4 caracteres" 
                  >
                  <label class="active"  for="nombre">Nombre de Usuario</label>
              </div> 
              <div class="input-field col s6">
                  <input  id="emaile" name="email" type="email" class="validate" value="" required>
                  <label class="active"  for="emaile">Email</label>
              </div>
              <div class="input-field col s6">
                  <input placeholder="Ingrese Nombre de CUI" id="cui" name="cui" type="text" class="validate cui" value="" required
              title="Ingrese un CUI valido : 9999-99999-9999">
                  
                  <label class="active"  for="emaile">CUI</label>
              </div>
              <div class="input-field col s6">
          
            Rol:  
            <select class="form-control" name="rol" id="rol">
            @foreach ($roles as $rl)
              <option value="{{$rl->id}}"

              >{{$rl->nombre}}</option>
            @endforeach
            </select>
          </div>
          <div class="input-field col s6">          
            <input id="contraseña" type="text" class="form-control" name="contrasena" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número , una mayúscula , una minúscula, y al menos 8 o más caracteres" required>
                  <label for="contraseña">Contraseña</label>
              </div>      


                      </div>
              </div>
</div>

  
  			 	
  <div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
      <button class="btn-floating btn-large green tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nuevo" type="submit">
      	<i class="fa fa-floppy-o"></i>
      </button>
      
    </div>

  
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
