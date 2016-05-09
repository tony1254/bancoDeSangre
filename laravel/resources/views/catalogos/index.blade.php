@extends('layouts.app')
@section('title') {{'Catalogo de '.$catalogo}}@stop

@section('content')
<div class="panel panel-default"  id="ver">
		        <div class="panel-heading">Catalogo de {{$catalogo}}</div>
		        	<div class="panel-footer">
						<ul class="collection">
							        @foreach ($datos as $dato)
						        <li class="collection-item dismissable">
							        <div>{{$dato->nombre}}
								 <!--        <a href="{{ url($mid.'/catalogos/'.$catalogo.'/delete') }}" class=" secondary-content red-text waves-effect waves-red">
									        <i class="material-icons" style="  vertical-align: top;">
									        	delete forever
									        </i>
								        </a> -->
								         <a href="{{ url($mid.'/catalogos/'.$catalogo.'/'.$dato->id.'/edit') }}" class=" btn-xs  secondary-content amber-text waves-effect waves-yellow transparent">
									        <i class="material-icons" style="  vertical-align: top;">
									        	create
									        </i>
								        </a>
								      

							        </div>
						        </li>
							        @endforeach
			 		    </ul>
			 		 </div>
			 	</div>
<div class="fixed-action-btn" style="bottom: 50px; right: 24px;">
    <a class="btn-floating btn-large red tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Nuevo" href="{{ url($mid.'/catalogos/'.$catalogo.'/create') }}">

    	<i class="fa fa-plus"></i>
    </a>
    
  </div>

@endsection
