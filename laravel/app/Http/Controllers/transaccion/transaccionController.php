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
use App\TSangre;
use App\TUnidad;
use App\CAlmacen;
use App\CCongelador;
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
$msj='';
if (empty($request->input('search'))) {
     $detalle=TDetalleTransaccion::whereBetween('created_at', array(date('Y-m-d  H:i:s', time()-86400),date('Y-m-d  H:i:s', time())))->paginate(10);
        return view('transaccion/index', ['transaccions' => $detalle,'mid'=>mid()]);
}else{
/**
   *busqueda
   */
  $busqueda=$request->input('search');
$detalle=TDetalleTransaccion::where('idTransaccion',$busqueda)->paginate(10);
$msj=$request->input('msj');
        return view('transaccion/index', ['transaccions' => $detalle,'msj'=>$msj,'mid'=>mid()]);
}
   }

public function show($id,Request $request)
   {
    $transaccion=TTransaccion::find($id);
    $persona=Persona::find($transaccion->idCliente);
    $usuario=User::find($transaccion->idUsuario);
    $detalles=TDetalleTransaccion::where('idTransaccion',$transaccion->id)->get();
    if(!empty($request->input('msj'))){
        return view('transaccion/show', ['msj'=>$request->input('msj'),'mid'=>mid(),'transaccion'=>$transaccion]);

    }
        return view('transaccion/show', ['mid'=>mid(),'transaccion'=>$transaccion,'persona'=>$persona,'usuario'=>$usuario,'detalles'=>$detalles]);
        return "show";    
   }
/**
   *FUncion para Validacion
   */
public function valida()
   {
        return view('transaccion/valida', ['mid'=>mid()]);
        return "show";    
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
public function create(Request $request)
   {
    $persona= Persona::where('cui',str_replace('-', '', $request->get('cui')))->first();
        
      if (count($persona)==0) {
        return view('transaccion/valida', ['msj'=>'Persona no encontrada','mid'=>mid()]);
      }
        return view('transaccion/create', ['mid'=>mid(),
          'persona'=> $persona,
          'almacenes'=>CAlmacen::all(),
          'congeladores'=>CCongelador::all(),
          ]);

   }
public function store(Request $request)
   {
        $persona=persona::find($request->input('persona'));
      if (count($persona)==0) {
        return view('transaccion/valida', ['msj'=>'Persona no encontrada','mid'=>mid()]);
      }
        $sangre=TSangre::where('idGrupoSangre',$persona->grupoSangre)
                        ->where('idFactorSangre',$persona->factorSangre)
                        ->where('idAlmacen',$request->input('almacen'))
                        ->first();
        /*Creando Nuevo recuento de Sangre Si no existe*/
      if(count($sangre)==0)
        {
          $sangre= new TSangre;
          $sangre->idGrupoSangre=$persona->grupoSangre;
          $sangre->idFactorSangre=$persona->factorSangre;
          $sangre->idAlmacen=$request->input('almacen');
          $sangre->save();
        }
        /*Creando Unidad de Sangre*/
        $unidad=new TUnidad;
        $unidad->idSangre=$sangre->id;
        $unidad->idHemoderivado=1;//Sangre Total
        $unidad->idAlmacen=$request->input('almacen');
        $unidad->idCongelador=$request->input('congelador');
        $unidad->idGrupoSangre=$persona->grupoSangre;
        $unidad->idFactorSangre=$persona->factorSangre;
        $unidad->caduca= date('Y-m-d', time()+86400*25 );//Sangre total caduca en un mes
        $unidad->contenido=$request->input('contenido');
        if ($persona->estado==1) {
          $unidad->idEstadoUnidad=1;//estado Activo
        }else{
          $unidad->idEstadoUnidad=2;//estado Inactivo
        }
        $unidad->save();
        /*Creando Transaccion*/
        $transaccion=new TTransaccion;
        $transaccion->idCliente=$persona->id;
        $transaccion->idUsuario=Auth::user()->id;
        $transaccion->idAlmacen=$request->input('almacen');
        $transaccion->idTipoTransaccion=1;//Donacion
        $transaccion->save();
        /*Creando Detalle Transaccion*/
        $detalle=new TDetalleTransaccion;
        $detalle->idTransaccion=$transaccion->id;
        $detalle->idUnidad=$unidad->id;
        $detalle->save();
        /*Incrementa en Sangre*/
        if ($persona->estado==1) {
          $sangre->sangreTotal=$sangre->sangreTotal+1;
        }else{
          $sangre->cuarentena=$sangre->cuarentena+1;
        }
        $sangre->save();
        return redirect()->to(mid().'/transaccion?search='.$detalle->idTransaccion.'&msj=Nueva Donacion Graba Exitosamente');

        
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
