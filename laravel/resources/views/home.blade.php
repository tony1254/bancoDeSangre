@extends('layouts.app')

@section('content')
<br>
<style type="text/css">
.contornear{
   text-shadow: -1px 0 #fff, 1px 0 #fff, 0 1px #fff, 0 -1px #fff;
   color: #b71c1c ;
}
  h3.fuego{
   text-shadow: 0 0 20px #fefcc9, 2px -2px 3px #feec85, -4px -4px 5px #ffae34, 5px -10px 6px #ec760c, -5px -12px 8px #cd4606, 0 -15px 20px #973716, 2px -15px 20px #451b0e;
   color: #666;
}

</style>
<div class="container">
     <div class="slider">
    <ul class="slides">
      <li>
        <img src="{{ url('bower_components/contenido/img1.jpg') }}"> <!-- random image -->
        <div class="caption center-align">
          <h3 class="contornear">Todos Ayudamos</h3>
          <h5 class="light contornear"><b>Con diferente Sangre.</b></h5>
        </div>
      </li>
      <li>
        <img src="{{ url('bower_components/contenido/img2.jpg') }}"> <!-- random image -->
        <div class="caption left-align">
          <h3>Donar Sangre</h3>
          <h5 class="light grey-text text-lighten-3">Salva una Vida.</h5>
        </div>
      </li>
      <li>
        <img src="{{ url('bower_components/contenido/img3.jpg') }}"> <!-- random image -->
        <div class="caption  right-align">
          <h3 class="contornear">Salva Vidas</h3>
          <h5 class="light contornear"><b> Con una Donacion.</b></h5>
        </div>
      </li>
      <li>
        <img src="{{ url('bower_components/contenido/img4.jpg') }}"> <!-- random image -->
        <div class="caption  contornear center-align">
          <h3 class="contornear">Es poco Tiempo!</h3>
          <h5 class="light contornear"><b> Solo son 15min.</b></h5>
        </div>
      </li>
    </ul>
  </div>
      
</div>
<script type="text/javascript">
   $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });

</script>
@endsection
