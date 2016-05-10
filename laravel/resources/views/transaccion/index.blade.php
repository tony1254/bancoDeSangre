@extends('layouts.app')
@section('title') {{'Transaccion'}}@stop

@section('content')

<div class="panel panel-default"  id="ver">
<script type="text/javascript">
            $(document).on('ready',function(){

   $('#busqueda').toggle();

  });
</script>
            <div id="titulo" class="panel-body" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').focus();">Transacciones<i class="material-icons right">search</i></div>
  
      <form id="busqueda" class="form" role="form" method="get" action="{{ url($mid.'/transaccion') }}">
        <div class="input-field ">        
          <input class="input-field" id="search" name="search" type="search" required placeholder="Ingrese Nombre,Apellido o DPI">
          <label for="search"></label>
          <i class="material-icons" onclick="$('#titulo').toggle(); $('#busqueda').toggle(); $('#search').val('');">close</i>
        </div>
      </form>
<div class="panel-footer">

  <ul class="collection">

  @foreach ($transaccions as $transaccion)
    <li class="collection-item avatar">
        <i class="material-icons circle green">call_received</i>
        <span class="title">O+</span>
        <p>
          Donante: Luis Garcia <br>
          ID: 1
        </p>
      <div class="secondary-content">
        <a href="{{ url($mid.'/transaccion/'.$transaccion->idTransaccion.'') }}" class=" btn-xs   blue-text waves-effect waves-blue transparent">
                              <i class="material-icons" style="  vertical-align: top;">
                                remove_red_eye
                              </i>
        </a>
         <a href="{{ url($mid.'/transaccion/'.$usutransaccionario->idTransaccion.'/edit') }}" class=" btn-xs   amber-text waves-effect waves-yellow transparent">
                            <i class="material-icons" style="  vertical-align: top;">
                              create
                            </i>
         </a>
      </div>
    </li>
  @endforeach
         <div class="text-center">
        @if(empty($busqueda))
          {!! $transaccions->links() !!} 
        @else
          {!! $transaccions->appends(['search' => $busqueda])->links() !!} 
        @endif
         </div>

  </ul> 
</div>
        </div>      
  <div id="titulo" class="panel-footer">
    <ul class="collection">
      <li class="collection-item avatar">
        <i class="material-icons circle green">call_received</i>
        <span class="title">O+</span>
        <p>
          Donante: Luis Garcia <br>
          ID: 1
        </p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
      </li>
      <li class="collection-item avatar">
        <i class="material-icons circle red">call_made</i>
        <span class="title">Title</span>
        <p>First Line <br>
           Second Line
        </p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
      </li>
    </ul>  
  </div>
</div>
  
          
  <div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
      <button class="btn-floating btn-large green tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nuevo" type="submit">
        <i class="material-icons">add</i>
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
