<?php

namespace App\Http\Controllers\sangre;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CRol;
use App\User;
use App\CSexo;
use App\Persona;
use App\TSangre;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Closure;
use Illuminate\Support\Facades\Auth;

class sangreController extends Controller
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

   /**
   *index
   */
public function index(Request $request)
   {
    
$mid=mid();

if (empty($request->input('search'))) {
     $sangres=TSangre::paginate(10);
        return view('sangre/index', ['sangres' => $sangres,'mid'=>$mid]);
}else{
   /**
   *busqueda
   */
  $busqueda=$request->input('search');
  $busqueda=str_replace ( '-', '' , $busqueda);
     $sangres =TSangre::where('id',$busqueda )->paginate(10);
        // return view('sangre/index', ['sangres' => $sangres,'mid'=>$mid]);
        return view('sangre/index', ['sangres' => $sangres ,'mid'=>$mid,'busqueda'=>$busqueda]);

}



        return "index";    
   }

public function show($id)
   {
        return view('sangre/show', ['mid'=>mid(),'roles'=>CRol::all(),'sangre'=>TSangre::find($id)]);
        return "show";    
   }
   /**
   *FUncion para editar
   */
public function edit($id)
   {
        return view('sangre/minimo', ['mid'=>mid(),'sangre'=>TSangre::find($id)]);

         
   }
   /**
   *FUncion para Crear
   */
public function create()
   {
        
        return view('usuario/create', ['mid'=>mid(),'roles'=>CRol::all()]);

   }
public function store(Request $request)
   {
         $usuario=new User;
        $usuario->name=$request->input('nombre');
        $usuario->cui=str_replace('-', '', $request->get('cui'));
        $usuario->rol=$request->input('rol');
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
        if (!empty($request->get('contrasena'))) {
           $usuario->password=bcrypt($request->get('contrasena'));
        }
        $usuario->save();  
        return redirect()->to('admin/usuario?search='.$usuario->cui);
         
        return "store";    
   }
   /**
   *FUncion para Actuaizar
   */   
public function update($id,Request $request)
   {
        $sangre=TSangre::find($id);
        $sangre->minimo=$request->input('minimo');
        $sangre->save();

        return redirect()->to(mid().'/sangre');

        return "update";    
   }
public function destroy($id)
   {
        return "destroy";    
   }
/**
   *FUncion para Validacion
   */
public function valida()
   {
        return view('sangre/minimo', ['mid'=>mid(),'sangre'=>TSangre::find(1)]);
        return "show";    
   }
/**
   *FUncion para Validacion
   */
public function validaMin()
   {
        return view('sangre/valida', ['mid'=>mid(),'sangre'=>TSangre::find(1)]);
        return "show";    
   }
}
