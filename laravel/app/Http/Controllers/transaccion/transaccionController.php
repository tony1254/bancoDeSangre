<?php

namespace App\Http\Controllers\transaccion;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CRol;
use App\User;
use App\CSexo;
use App\Persona;
use App\UAfeccion;
use App\CTipoAfeccion;
use App\TDetalleTransaccion;
use App\TTransaccion;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Closure;
use Illuminate\Support\Facades\Auth;

class transaccionController extends Controller
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
if (empty($request->input('search'))) {
     $detalle=TDetalleTransaccion::paginate(10);
        return view('transaccion/index', ['transaccions' => $detalle,'mid'=>mid()]);
}else{
/**
   *busqueda
   */
  $busqueda=$request->input('search');
  $busqueda=str_replace ( '-', '' , $busqueda);
     $personas=Persona::where('cui','like','%'.$busqueda.'%'  )->orWhere('nombre','like','%'.$busqueda.'%'  )->orWhere('apellido','like','%'.$busqueda.'%'  )->paginate(10);
        return view('persona/index', ['personas' => $personas,'mid'=>mid(),'busqueda'=>$busqueda]);

}
   }

public function show($id,Request $request)
   {
    $persona=Persona::find($id);
    if(!empty($request->input('msj'))){
        return view('persona/show', ['msj'=>$request->input('msj'),'mid'=>mid(),'sexos'=>CSexo::all(),'persona'=>$persona,'afecciones'=>UAfeccion::where('cui',$persona->cui)->get()]);

    }
        return view('persona/show', ['mid'=>mid(),'sexos'=>CSexo::all(),'persona'=>$persona,'afecciones'=>UAfeccion::where('cui',$persona->cui)->get()]);
        return "show";    
   }
      /**
   *FUncion para Afecciones
   */
public function afeccionGet($id)
   {
    $persona=Persona::find($id);
    
        return view('persona/afeccionesAdd', ['mid'=>mid(),'persona'=>$persona,'afecciones'=>CTipoAfeccion::all()]);
        return "show";    
   }
      /**
   *FUncion para post de afeccion
   */
public function afeccionAdd($id,Request $request)
   {
    $persona=Persona::find($id);
    $persona->estado=0;
    $persona->save();
$afeccion=new UAfeccion;
$afeccion->cui=$persona->cui;
$afeccion->idTipoAfeccion=$request->input('afeccion');
$afeccion->save();
        return redirect()->to(mid().'/persona/'.$persona->id.'?msj=Nueva Afeccion Agregada exitosamente');
   }      /**
   *FUncion para eliminar de afeccion
   */
public function afeccionEliminar($idp,$ida,Request $request)
   {

    $afeccion=UAfeccion::find($ida);
    $cui=$afeccion->cui;
    $afeccion->delete();
    $afecciones=UAfeccion::where('cui',$cui)->get();

    if (count($afecciones)==0) {
      $persona=Persona::find($idp);
      $persona->estado=1;
      $persona->save();
    }
        return redirect()->to(mid().'/persona/'.$idp.'?msj=Afeccion Eliminada exitosamente');
   }
   /**
   *FUncion para editar
   */
public function edit($id)
   {

        return view('persona/edit', ['mid'=>mid(),'sexos'=>CSexo::all(),'persona'=>Persona::find($id)]);
         
   }
   /**
   *FUncion para Crear
   */
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
        return redirect()->to(mid().'/persona?search='.$persona->cui);
         
        return "store";    
   }
   /**
   *FUncion para Actuaizar
   */   
public function update($id,Request $request)
   {
         $persona= Persona::find($id);
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
        // $persona->estado=$request->input('estado');
        $persona->save();  
        return redirect()->to(mid().'/persona?search='.$persona->cui);

        return "update";    
   }
public function destroy($id)
   {
        return "destroy";    
   }

}
