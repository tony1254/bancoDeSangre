@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Mi Perfil</div>

                <div class="panel-body">
                    Inicio de session correcto!
                    <br>
                    <br>
<script type="text/javascript">

    function prueba() {
    // alert("hola");
      Materialize.toast('Mira Mi Muchachita Te Amo Muchoo Muuuaaa!!!!!', 3000, 'rounded') // 'rounded' is the class I'm applying to the toast

    $( "#salida" ).load( "\\usuarios" );
}


</script>


                    <a onclick="prueba()" class="btn  waves-effect waves-light  white-text" type="button">
                        <i class="material-icons left" >cloud</i>
                        button
                    </a>

                    <div id="salida"></div>

            <ul id="dropdown2" class="dropdown-content">
    <li><a class="nounderline  "  href="#!">one<span class="badge transparent">1</span></a></li>
    <li><a class="nounderline  "  href="#!">two<span class="new badge">1</span></a></li>
    <li><a class="nounderline  "  href="#!">three</a></li>
  </ul>
  <a class="btn dropdown-button" href="#!" data-activates="dropdown2">Dropdown<i class="fa fa-angle-down right" aria-hidden="true"></i>
</a>
                    {{var_dump(Auth::user())}}
                    <br>


    <div class="fixed-action-btn vertical click-to-toggle" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
        <i class="fa fa-bars fa-2x"></i>    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
