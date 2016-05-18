@extends('layouts.app')

@section('content')


<style type="text/css">
	.tabs .indicator{background-color:#003399;}
</style>
<div class="row">
    <div class="col-sm-12 ">
      <ul class="tabs  ">
@if (Auth::user()->rol==1)
      	
        <li class="tab col s3  "><a  href="#test1" class=" blue-text text-darken-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Panel de Control"><i style="  vertical-align: middle;" class="fa fa-cog fa-2x" aria-hidden="true"></i>
</a></li>
@endif
        <li class="tab col s3"><a onclick=" ver()" class="active blue-text text-darken-4 tooltipped" href="#test2" data-position="bottom" data-delay="50" data-tooltip="Usuario"><i  style="  vertical-align: middle;"class="fa fa-2x fa-user-md" aria-hidden="true"></i>
</a></li>
        <li class="tab col s3"><a onclick=" verper()" href="#test4"class=" blue-text text-darken-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Persona"><i class="fa fa-2x fa-universal-access" aria-hidden="true" style="  vertical-align: middle;"></i>
</a></li>
      </ul>
    </div>
@if (Auth::user()->rol==1)

    <div id="test1" class="col s12">
      <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="fa fa-cogs" aria-hidden="true"></i>Catalogos</div>
      <div class="collapsible-body"><p>
				<a href="{{ url($mid.'/catalogos/sexo') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-venus-mars fa-2x" aria-hidden="true"></i>Sexos
				</a>

				<a href="{{ url($mid.'/catalogos/rol') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-braille fa-2x" aria-hidden="true"></i>
					Roles
				</a>
				<a href="{{ url($mid.'/catalogos/almacen') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-cubes fa-2x" aria-hidden="true"></i>
					Almacenes
				</a>
				<a href="{{ url($mid.'/catalogos/congelador') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-cube fa-2x" aria-hidden="true"></i>
					Congeladores
				</a>
				<a href="{{ url($mid.'/catalogos/estadoUnidad') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i>
					Estados de Unidades
				</a>
				<a href="{{ url($mid.'/catalogos/factorSangre') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-tint fa-2x" aria-hidden="true"></i>
					Factores de Sangre
				</a>
				<a href="{{ url($mid.'/catalogos/grupoSangre') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-tint fa-2x" aria-hidden="true"></i>
					Grupos de Sangre
				</a>
				<a href="{{ url($mid.'/catalogos/hemoderivado') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-tint fa-2x" aria-hidden="true"></i>
					Hemoderivados
				</a>
				<a href="{{ url($mid.'/catalogos/tipoAfeccion') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-stethoscope fa-2x" aria-hidden="true"></i>
					Tipos de Afecciones
				</a>
				<a href="{{ url($mid.'/catalogos/tipoTransaccion') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-exchange fa-2x" aria-hidden="true"></i>
					Tipos de trannsacciones
				</a>
      		</p>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">fingerprint</i>Control Modulo Usuario/persona</div>
      <div class="collapsible-body"><p>
				<a href="{{ url('/admin/usuario') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-users fa-2x" aria-hidden="true"></i>
					Usuarios
				</a>
				<a href="{{ url('/'.mid().'/persona') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-universal-access fa-2x" aria-hidden="true"></i>
					Personas
				</a>

      </p></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">data_usage</i>Reportes</div>
      <div class="collapsible-body"><p>
	<a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/reportes') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Menu</a>
	<a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/rptPersona') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Reporte de Donantes</a>
  <a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/gDonantes') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Grafica de Donantes</a>
  <a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/gUnidades') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Grafica de Unidades</a>
    <a  class="btn teal white-text waves-effect waves-light" href="{{ url(mid().'/gTransacciones') }}"><i class="fa fa-search fa-2x" aria-hidden="true"></i>Grafica de Transacciones</a>

      </p></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Transacciones</div>
      <div class="collapsible-body"><p>
				<a href="{{ url($mid.'/transaccion/') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-exchange fa-2x" aria-hidden="true"></i>
					Trannsacciones
				</a>
				<a href="{{ url($mid.'/sangre') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-exchange fa-2x" aria-hidden="true"></i>
					Sangre por Congeladores
				</a>
				<a href="{{ url($mid.'/unidad') }}" class="btn teal white-text waves-effect waves-light"><i class="fa fa-tint fa-2x" aria-hidden="true"></i>
					Unidades
				</a>			
      </p></div>
    </li>
  </ul>
        
    </div>
@endif    
<div class="text-center">
	
 <div class="preloader-wrapper big active " id="carga" style="display">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
</div>
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

    <div id="test2" class="col s12 " >

		<div class="panel panel-default " id="ver" >
	
		        <div class="panel-heading" >Usuario</div>
		        <div class="panel-body">
		         
				
					<b>Nombre de Usuario:</b> {{$usuario->name}}
					<br>
                    
					<b>CUI:</b> {{substr($usuario->cui , 0, 4)}}-{{substr($usuario->cui , 4, 5)}}-{{substr($usuario->cui , 9, 4)}}
					<br>
					<b>Email:	</b>{{$usuario->email}}
					<br>
					<b>Rol:</b>	{{$rol}}
		 		</div>
		 		<div class="panel-footer">
					<div class="row">
						<div class="col-xs-3 col-xs-offset-9">
							<a class="btn btn-floating btn-fab amber   darken-3 waves-effect waves-light" onclick=" editar();"><i class="medium material-icons ">create</i></a>
						</div>
					</div>
		 			
		 		</div>
  
    	</div>    

    </div>
<script type="text/javascript">
function editar(){
	$( '#ver' ).toggle();
	$('#carga').show();
$( '#test2' ).load( '{{ url($mid.'/usuarios/'.$usuario->id.'/edit ') }}' );
}

function ocultar(){
				$('#carga').hide();
}
	            $(document).on('ready',function(){
				$('#carga').hide();

});
</script>    

    <div id="test4" class="col s12">
 
		
		    <div class="panel panel-default" id="ver2">
		        <div class="panel-heading">Persona</div>
		        <div class="panel-body">
		        @if (count($persona)==0)
		        	Aun no hay Persona Vinculada
		        @else

<!-- {{$mid=mid()}} -->

		        <script type="text/javascript">
		        	function editarper(){
						$( '#ver2' ).toggle();
						$('#carga').show();
						$( '#test4' ).load( '\\{{$mid}}/personas/{{$persona->id}}/edit' );
					}
		        </script>
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
		  <div class="panel-footer">
					<div class="row">
						<div class="col-xs-3 col-xs-offset-9">
							<a class="btn btn-floating btn-fab amber  darken-3 waves-effect waves-light
								@if (count($persona)==0)
								disabled
								@endif
							" onclick=" editarper();"><i class="material-icons">create</i></a>
						</div>
					</div>
		 			
		 		</div>
    	</div>
    </div>
    </div>





 

@endsection

