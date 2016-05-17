@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}
<div class="row">
 <div class="col-md-7 col-md-offset-2">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-field  ">
                                  <i class="fa fa-user  prefix"></i>
                                                            
                                                                <input id="email" type="email" class="form-control validate" name="email" autofocus value="{{ old('email') }}">

                                                                @if ($errors->has('email'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            
                                          <label for="email">E-Mail</label>
                                        </div>    
                        </div>
                        </div>
                        </div>

<div class="row">
 <div class="col-md-7 col-md-offset-2">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<div class="input-field  ">
          
  <i class="fa fa-lock  prefix"></i>

                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                           
          <label for="password">Contraseña</label>
        </div>    
      </div>

 </div>
 </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              
                                 <p>
                                      <input type="checkbox" id="remember"  name="remember" />
                                      <label for="remember">Recuerdame</label>
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-2">
                                <button type="submit" class="btn btn-primary white-text blue darken-4 waves-effect waves-light ">
                                    <i class="fa fa-btn fa-sign-in"></i>Iniciar Sesion
                                </button>
  <a class="waves-effect  btn-flat waves-red blue-text text-darken-4" href="{{ url('/password/reset') }}">Olvidaste tu Contraseña?</a>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
