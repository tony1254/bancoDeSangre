<div class="panel panel-default"  id="ver2">
		        <div class="panel-heading">persona</div>
		        <div class="panel-body">
		        <form class="form" role="form" method="POST" action="{{ url($mid.'/personas/'.$persona->id) }}">
                        {!! csrf_field() !!}
<input type="text" name="id" value="" hidden>
<input type="text" name="_method" value="PUT" hidden>
					  <div class="input-field col s6">
				          <input  id="nombre" name="nombre" type="text" class="validate" value="{{$persona->nombre}}" required>
				          <label class="active"  for="nombree">Nombre</label>
				      </div> 
					  <div class="input-field col s6">
				          <input  id="apellido" name="apellido" type="text" class="validate" value="{{$persona->apellido}}" required>
				          <label class="active"  for="nombree">Apellidos</label>
				      </div> 
				      <div class="input-field col s6">
				          <input  id="email" name="email" type="email" class="validate" value="{{$persona->email}}" required>
				          <label class="active"  for="email">Email</label>
				      </div>
				      <div class="input-field col s6">
				          <input placeholder="Ingrese CUI" id="cui" name="cui" type="text" class="validate cui" value="{{$persona->cui}}" required
 							title="Ingrese un CUI valido : 9999-99999-9999">
				          
				          <label class="active"  for="emaile">CUI</label>
				      </div>
				      <div class="input-field col s6">	
				      
				      	<div class="col-xs-3">
				      		Sexo:
				      	</div>
				      	<div class="col-xs-9">
				      		
						<select class="form-control" name="sexo" id="sexo">
						@foreach ($sexos as $sexo)
							<option value="{{$sexo->id}}"
								@if ($sexo->id==$persona->sexo)
									selected 
								@endif
							>{{$sexo->nombre}}</option>
						@endforeach
						</select>
				      	</div>
				      
					</div>
                            <div class="input-field col s6">  
                            
                              <div class="col-xs-6">
                                Tipo de Sangre:
                              </div>
                              <div class="col-xs-3">
                                
                          <select class="form-control" name="grupoSangre" id="grupoSangre">
                          @foreach (App\CGrupoSangre::all() as $sexo)
                            <option value="{{$sexo->id}}"
								@if ($sexo->id==$persona->grupoSangre)
									selected 
								@endif
                            >{{$sexo->nombre}}</option>
                          @endforeach
                          </select>
                              </div>
                              <div class="col-xs-3">
                                
                          <select class="form-control" name="factorSangre" id="factorSangre">
                          @foreach (App\CFactorSangre::all() as $sexo)
                            <option value="{{$sexo->id}}"
                            	@if ($sexo->id==$persona->factorSangre)
									selected 
								@endif
							>{{$sexo->nombre}}</option>
                          @endforeach
                          </select>
                              </div>
                            
                        </div>					
					<div class="input-field col s6">
				          <input  id="vecindad" name="vecindad" type="text" class="validate" value="{{$persona->vecindad}}" required>
				          <label class="active"  for="nombree">Vecindad</label>
				      </div>				
				      <div class="input-field col s6">
				          <input placeholder="Ingrese Nombre de fechaNacimiento" id="fechaNacimiento" name="fechaNacimiento" type="date" class="validate fechaNacimiento" value="{{$persona->fechaNacimiento}}" required
 							title="Ingrese un fechaNacimiento valido">
				          
				          <label class="active"  for="emaile">Fecha de Nacimiento</label>
				      </div>
				      <div class="input-field col s6">
				          <input placeholder="Ingrese Nombre de telefono1" id="telefono1" name="telefono1" type="text" class="validate telefono1" value="{{$persona->telefono1}}" required
 							title="Ingrese un telefono1 valido : 9999-9999">
				          
				          <label class="active"  for="emaile">Telefono 1</label>
				      </div>
				      <div class="input-field col s6">
				          <input placeholder="Ingrese Nombre de telefono2" id="telefono2" name="telefono2" type="text" class="validate telefono2" value="{{$persona->telefono2}}" 
 							title="Ingrese un telefono2 valido : 9999-9999">
				          
				          <label class="active"  for="emaile">telefono 2</label>
				      </div>	    
					<div class="row">
						<div class="col-xs-3 col-xs-offset-9">
							<button class="btn btn-floating btn-fab green  darken-1 waves-effect waves-light" type="submit"><i class="material-icons">create</i></button>
						</div>
					</div>

		 		</div>
		 		</form>
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