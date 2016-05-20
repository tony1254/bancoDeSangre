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
use App\TUnidad;
use App\CAlmacen;
use App\CCongelador;
use App\TTransaccion;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Closure;
use Illuminate\Support\Facades\Auth;

class unidadController extends Controller
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
     $unidad=TUnidad::paginate(10);
        return view('unidad/index', ['unidades' => $unidad,'mid'=>$mid]);
}else{
   /**
   *busqueda
   */
  $busqueda=$request->input('search');
  $busqueda=str_replace ( '-', '' , $busqueda);
     $unidades=TUnidad::where('id',$busqueda )->paginate(10);
        return view('unidad/index', ['unidades' => $unidades,'mid'=>$mid,'busqueda'=>$busqueda]);

}



        return "index";    
   }

public function show($id,Request $request)
   {
    if(!empty($request->input('msj'))){
        return view('unidad/show', ['msj'=>$request->input('msj'),'mid'=>mid(),'unidad'=>TUnidad::find($id)]);
    }
        return view('unidad/show', ['mid'=>mid(),'unidad'=>TUnidad::find($id)]);
   }
   /**
   *FUncion para editar
   */
public function edit($id)
   {
        return view('unidad/edit', ['mid'=>mid(),'almacenes'=>CAlmacen::all(),'congeladores'=>CCongelador::all(),'unidad'=>TUnidad::find($id)]);
         
   }
   /**
   *FUncion para Crear
   */
public function create()
   {
        
        return view('unidad/create', ['mid'=>mid(),'almacenes'=>CAlmacen::all(),'congeladores'=>CCongelador::all()]);

   }
public function store(Request $request)
   {
        $unidad= new TUnidad;
          $unidad->idGrupoSangre=$request->input('grupoSangre');
          $unidad->idFactorSangre=$request->input('factorSangre');
          $unidad->idHemoderivado=$request->input('hemoderivado');
          $unidad->idAlmacen=$request->input('almacen');
          $unidad->idCongelador=$request->input('congelador');
          $unidad->idEstadoUnidad=1;//activa
          $unidad->caduca=vencimiento($request->input('hemoderivado'));
          $unidad->contenido=$request->input('contenido');
          $unidad->save();
        return redirect()->to('admin/unidad?search='.$unidad->id);
   }
   /**
   *FUncion para Actuaizar
   */   
public function update($id,Request $request)
   {
         $unidad= TUnidad::find($id);
          $unidad->idAlmacen=$request->input('almacen');
          $unidad->idCongelador=$request->input('congelador');
          $unidad->idEstadoUnidad=$request->input('estado');
          $unidad->caduca=$request->input('caduca');
          $unidad->contenido=$request->input('contenido');
          $unidad->save();
        return redirect()->to('admin/unidad?search='.$unidad->cui);

        return "update";    
   }
public function destroy($id,Request $request)
   {
    $unidad=TUnidad::find($id);
    if ($unidad->idEstadoUnidad==2) {
      $unidad->idEstadoUnidad=1;//estado Activar Unidad de Sangre
      $msj='Unidad Activada';
    }else{
      $unidad->idEstadoUnidad=2;//estado Inactivar Unidad de Sangre
      $msj='Unidad Inactivada';
    }
    $unidad->save();
        return redirect()->to('admin/unidad/'.$unidad->id.'?msj='.$msj);
        return "destroy";    
   }

}
