<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

        switch (Auth::guard($guard)->user()->rol) {
            case '1':
                # Administrador            
            return redirect()->to('admin/usuarios/'.Auth::guard($guard)->user()->id);
                break;
            case '2':
                # Encargado
            return redirect()->to('encargado');
                break;
            case '3':
                # Usuario
            return redirect()->to('usuario');
                break;   
            default:
                # code...
            return redirect()->to('login');

                break;

        }
            return redirect('/admin/usuarios/'.Auth::guard($guard)->user()->id);

        }

        return $next($request);
    }
}
