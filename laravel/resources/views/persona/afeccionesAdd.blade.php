<div id="afeecion">
<form class="form" role="form" method="POST" action="{{ url($mid.'/persona/'.$persona->id.'/afeccionAdd') }}">

                        {!! csrf_field() !!}
           <div class="input-field row">  
                <div class="col-sm-1">
                  Afeccion:
                </div>
                <div class="col-sm-3">
                  <select class="form-control" name="afeccion" id="afeccion">
                              @foreach ($afecciones as $afeccion)
                                <option value="{{$afeccion->id}}"
                                >{{$afeccion->nombre}}</option>
                              @endforeach
                  </select>
              </div>
                <div class="col-sm-3">
                 <input type="date" class="form-control" name="fecha" id="fecha" value="{{date('Y-m-d', time())}}">
              </div>
            <div class="col-sm-3 col-sm-offset-2">
              <button class="btn btn-floating btn-fab-mini green  darken-3 waves-effect waves-light tooltipped
              "data-position="left" data-delay="50" data-tooltip="grabar afecciones a Persona" type="sumit" >
        <i class="fa fa-floppy-o"></i>
              </button>

              <a class="btn btn-floating btn-fab-mini red  darken-3 waves-effect waves-light tooltipped
              "data-position="left" data-delay="50" data-tooltip="Cancelar" href="{{ url($mid.'/persona/'.$persona->id) }} ">
        <i class="fa fa-times"></i>
              </a>
          </div>
            </div>
      
</form>
      </div>
      
      <script type="text/javascript">  

      $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });</script>