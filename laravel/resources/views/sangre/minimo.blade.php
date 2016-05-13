@extends('layouts.app')
@section('title') {{'Transaccion valida'}}@stop

@section('content')


  
<form class="form" role="form" method="POST" action="{{ url($mid.'/sangre/'.$sangre->id.'/') }}">
                 {!! csrf_field() !!}
<input type="text" name="_method" value="PUT" hidden>
<div class="panel panel-default"  id="ver">
            <div class="panel-heading"> Validacion nueva transaccion</div>
              <div class="panel-body">
            <div class="input-field col s6">
            <input type="text"  name="minimo" id="minimo" required  value="{{$sangre->minimo}}">
            <label class="active"  for="minimo">Minimo</label>
              </div> 
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
