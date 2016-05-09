<?php

namespace App\Http\Controllers\personas;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CRol;
use App\User;
use App\CSexo;
use App\Persona;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Closure;
use Illuminate\Support\Facades\Auth;

class personaController extends Controller
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
     $personas=Persona::paginate(10);
        return view('persona/index', ['personas' => $personas,'mid'=>$mid]);
}else{
   /**
   *busqueda
   */
  $busqueda=$request->input('search');
  $busqueda=str_replace ( '-', '' , $busqueda);
     $personas=Persona::where('cui','like','%'.$busqueda.'%'  )->orWhere('nombre','like','%'.$busqueda.'%'  )->orWhere('apellido','like','%'.$busqueda.'%'  )->paginate(10);
        return view('persona/index', ['personas' => $personas,'mid'=>$mid,'busqueda'=>$busqueda]);

}



        return "index";    
   }

public function show($id)
   {
        return "show";    
   }
public function edit($id)
   {
        return "edit";    
   }
public function create()
   {
        
        return view('persona/create', ['mid'=>mid(),'sexos'=>CSexo::all()]);

   }
public function store(Request $request)
   {
         $persona=new Persona;
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('apellido');
        $persona->vecindad=$request->input('vecindad');
        $persona->telefono1=$request->input('telefono1');
        $persona->telefono2=$request->input('telefono2');
        $persona->cui=str_replace('-', '', $request->get('cui'));
        $persona->email=$request->input('email');
        $persona->sexo=$request->input('sexo');
        $persona->grupoSangre=$request->input('grupoSangre');
        $persona->factorSangre=$request->input('factorSangre');
        $persona->fechaNacimiento=$request->input('fechaNacimiento');
        $persona->save();  
        return redirect()->to('admin/persona?search='.$persona->cui);
         
        return "store";    
   }
public function update(Request $request)
   {
        return "update";    
   }
public function destroy($id)
   {
        return "destroy";    
   }

}
