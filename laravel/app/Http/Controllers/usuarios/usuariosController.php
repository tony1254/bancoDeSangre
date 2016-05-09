<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CRol;
use App\User;
use App\Persona;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Closure;
use Illuminate\Support\Facades\Auth;

class usuariosController extends Controller
{
       /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
            return redirect()->to('admin/usuarios/'.Auth::user()->id);

    }
public function create()
    {
        return view('auth/register');

    }
public function edit($id)
    {
        $usuario=User::find($id);
         $usuario->name;
        $rol=CRol::find($usuario->rol)->nombre;
        $roles=CRol::all();
$mid=mid();

        return view('usuarios/editar', ['roles' => $roles,'rol' => $rol,'usuario'=>$usuario,'mid'=>$mid]);

    }
public function show($id)
    {

        $usuario=User::find(Auth::user()->id);
         $usuario->name;
        $rol=CRol::find($usuario->rol)->nombre;

        $persona=Persona::where('cui','=',$usuario->cui)->first();
$mid=mid();
        return view('adminIndex', ['persona' => $persona,'rol' => $rol,'usuario'=>$usuario,'mid'=>$mid]);
    }             
public function update(Request $request, $id)
    {
        $var=$request->get('contrasena');
        $usuario=User::find($id);
        $usuario->name=$request->get('nombre');
        $usuario->rol=$request->get('rol');
        $usuario->cui=str_replace('-', '', $request->get('cui'));
             $v = \Validator::make($request->all(), [
            
              'email' => 'required|email|max:255|unique:users',
            'contrasena' => 'min:6'
            ],[
    'unique' => 'Usuario ya existente',
    'min' => 'Contraseña no cumple con el tamaño minimo',
    'required' => 'Falto llenar campos',
]);
             if($usuario->email!=$request->input('email')){

            if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }   
             }
        $usuario->email=$request->input('email');
        if (!empty($var)) {
            $usuario->password=bcrypt($request->get('contrasena'));
        }
        $usuario->save();
        return redirect()->to('admin/usuarios/'.Auth::user()->id);
        return User::find($id);
        return $request->get('contrasena');

    }
}
