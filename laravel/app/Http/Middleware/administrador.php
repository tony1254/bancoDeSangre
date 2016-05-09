<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Session;

class administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next,$guard = null)
    {
            

        switch (Auth::guard($guard)->user()->rol) {
            case '1':
                # Administrador
            
            //return redirect()->to('/');
            // return redirect()->to('admin/usuarios/'.Auth::guard($guard)->user()->id);

                break;
            case '2':
                # Encargado
            return redirect()->to('encargado/usuarios/'.Auth::guard($guard)->user()->id);
                break;
            case '3':
                # Usuario
            return redirect()->to('usuario/usuarios/'.Auth::guard($guard)->user()->id);
                break;   
            default:
                # code...
            return redirect()->to('login');

                break;

        }
        
        return $next($request);
    }
}
