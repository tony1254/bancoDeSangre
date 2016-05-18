<div class="panel panel-default"  id="ver">
		        <div class="panel-heading">Usuario</div>
		        <div class="panel-body">
		        <form class="form" role="form" method="POST" action="{{ url($mid.'/usuarios/'.$usuario->id) }}">
                        {!! csrf_field() !!}
<input type="text" name="_method" value="PUT" hidden>
					  <div class="input-field col s6">
				          <input id="nombre" name="nombre" type="text" class="validate" value="{{$usuario->name}}" required
				         pattern=".{0}|.{4,}" title="Debe contener un minimo de 4 caracteres" 
				          >
				          <label class="active"  for="nombre">Nombre de Usuario</label>
				      </div> 
				      <div class="input-field col s6">
				          <input  id="emaile" name="email" type="email" class="validate" value="{{$usuario->email}}" required>
				          <label class="active"  for="emaile">Email</label>
				      </div>
				      <div class="input-field col s6">
				          <input placeholder="Ingrese Nombre de CUI" id="cui" name="cui" type="text" class="validate cui" value="{{$usuario->cui}}" required disabled="" 
 							title="Ingrese un CUI valido : 9999-99999-9999">
				          
				          <label class="active"  for="emaile">CUI</label>
				      </div>
				      <div class="input-field col s6">
					
						Rol:	
						<select class="form-control" name="rol" id="rol" disabled="">
						@foreach ($roles as $rl)
							<option value="{{$rl->id}}"
								@if ($rl->id==$usuario->rol)
									selected 
								@endif
							>{{$rl->nombre}}</option>
						@endforeach
						</select>
					</div>
					<div class="input-field col s6">					
						<input id="contraseña" type="text" class="form-control" name="contrasena" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número , una mayúscula , una minúscula, y al menos 8 o más caracteres">
			          	<label for="contraseña">Contraseña</label>
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
    	function ver(){
	
	
$( '#carga' ).show();
	$( '#ver' ).toggle();

location.reload();
}
				$('#carga').toggle();
                $("#cui").mask("9999-99999-9999");

    	</script>