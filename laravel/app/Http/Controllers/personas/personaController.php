<?php

namespace App\Http\Controllers\personas;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CRol;
use App\User;
use App\CSexo;
use App\Persona;
use App\UAfeccion;
use App\CTipoAfeccion;
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
// return $request->all();
// return var_dump( empty($request->all()));
if (empty($request->all())) {
     $personas=Persona::paginate(10);
        return view('persona/index', ['personas' => $personas,'mid'=>$mid]);
}else{
   /**
   *busqueda
   */
   $paginas=10;
   $sexo=$request->input('sexo');
   $factorSangre=$request->input('factorSangre');
   $grupoSangre=$request->input('grupoSangre');
   $minima=$request->input('minima');
   $maxima=$request->input('maxima');
  $busqueda=$request->input('search');
  $busqueda=str_replace ( '-', '' , $busqueda);
  // return var_dump(empty($busqueda));

     $personas=filtroPersona($sexo,$grupoSangre,$factorSangre,$minima,$maxima,$paginas);
    if (empty($personas)) {
      $personas=Persona::where('cui','like','%'.$busqueda.'%'  )
                    ->orWhere('nombre','like','%'.$busqueda.'%'  )
                    ->orWhere('apellido','like','%'.$busqueda.'%'  )
                    ->paginate($paginas);
    }





        return view('persona/index',  ['personas' => $personas,'mid'=>$mid,'busqueda'=>$busqueda,'wsexo'=>$sexo,'wfactorSangre'=>$factorSangre,'wgrupoSangre'=>$grupoSangre,'wminima'=>$minima,'wmaxima'=>$maxima]);

}



        return "index";    
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
 
$date=date_create($request->input('fecha'));
$date=date_format($date,"Y-m-d H:i:s");
$afeccion=new UAfeccion;
$afeccion->cui=$persona->cui;
$afeccion->idTipoAfeccion=$request->input('afeccion');
$afeccion->save();
$afeccion->created_at=$date;
$afeccion->save();
   $persona->estado=0;
$fechaNacimiento=date_create($persona->fechaNacimiento);


   
   if($request->input('afeccion')==1&&$afeccion->created_at<date('Y-m-d H:i:s',strtotime ( '+11 year' , strtotime (date_format($fechaNacimiento,"Y-m-d H:i:s")) ) ))
   {
      $persona->estado=1;
   }
    
    $persona->save();

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
    $date=date_create($request->input('fechaNacimiento'));


       
         $persona= Persona::where('cui',str_replace('-', '', $request->get('cui')))->orWhere('email',$request->input('email'))->first();
if (count($persona)==1) {
return view('persona/show', ['msj'=>'Campos Repetidos','mid'=>mid(),'sexos'=>CSexo::all(),'persona'=>$persona,'afecciones'=>UAfeccion::where('cui',$persona->cui)->get()]);  
}
         $persona=new Persona;
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('apellido');
        $persona->vecindad=$request->input('vecindad');
        $persona->telefono1=$request->input('telefono1');
        $persona->telefono2=$request->input('telefono2');
        // $request->get('cui')=str_replace('-', '', $request->get('cui'));
        $persona->cui=str_replace('-', '', $request->get('cui'));
        $persona->email=$request->input('email');
        $persona->sexo=$request->input('sexo');
        $persona->grupoSangre=$request->input('grupoSangre');
        $persona->factorSangre=$request->input('factorSangre');
        $persona->peso=$request->input('peso');
        $persona->fechaNacimiento=date_format($date,"Y-m-d");

        // $v = \Validator::make($persona, [
        //     'email' => 'required|email|max:255|unique:users',
        //     'cui' => 'required|unique:persona',
        //     'contrasena' => 'min:6'
        //     ],[
        //     'unique' => 'Usuario ya existente',
        //     'min' => 'Contraseña no cumple con el tamaño minimo',
        //     'required' => 'Falto llenar campos',
        //     ]);
             
        //       if ($v->fails())
        //         {
        //             return redirect()->back()->withInput()->withErrors($v->errors());
        //         }   
             // return var_dump($persona->fechaNacimiento<date('Y-m-d', time()-86400*365.25*65 ));
$menor=false;//menor de edad
$mayor=false;//adulto mayor de edad
if ($persona->fechaNacimiento<date('Y-m-d', time()-86400*365.25*65 )) {
  $mayor=true;//adulto mayor de edad
}
if ($persona->fechaNacimiento>date('Y-m-d', time()-86400*365.25*18 )) {
  $menor=true;//menor de edad
}

        if($persona->peso<50||$mayor||$menor)//si espeso bajo o es mayor o es menor
        {
          $persona->estado=0;
        }else{
          $persona->estado=1;
        }


        $persona->save();  
        return redirect()->to(mid().'/persona?search='.$persona->cui);
         
        return "store";    
   }
   /**
   *FUncion para Actuaizar
   */   
public function update($id,Request $request)
   {
    $date=date_create($request->input('fechaNacimiento'));

 $persona= Persona::where('cui',str_replace('-', '', $request->get('cui')))->orWhere('email',$request->input('email'))->first();
if($persona->id!=$id){
  if (count($persona)==1) {
  return view('persona/show', ['msj'=>'ERROR: Ya Existe este usuario','mid'=>mid(),'sexos'=>CSexo::all(),'persona'=>$persona,'afecciones'=>UAfeccion::where('cui',$persona->cui)->get()]);  
  }
}
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
        $persona->peso=$request->input('peso');
        $persona->fechaNacimiento=date_format($date,"Y-m-d");
        // $persona->estado=$request->input('estado');
//return var_dump($persona->peso<50||$persona->fechaNacimiento>date('Y-m-d', time()-86400*360*18 ));
$menor=false;//menor de edad
$mayor=false;//adulto mayor de edad
if ($persona->fechaNacimiento<date('Y-m-d', time()-86400*365.25*65 )) {
  $mayor=true;//adulto mayor de edad
}
if ($persona->fechaNacimiento>date('Y-m-d', time()-86400*365.25*18 )) {
  $menor=true;//menor de edad
}
      // return date('Y-m-d', time()-86400*365.25*65 ).$persona->fechaNacimiento.$persona->fechaNacimiento.date('Y-m-d', time()-86400*365.25*18 ) ;
      // return  var_dump(( $persona->fechaNacimiento<date('Y-m-d', time()-86400*365.25*65 )&&$persona->fechaNacimiento>date('Y-m-d', time()-86400*365.25*18 ) ));
// return var_dump($mayor).var_dump($menor).var_dump($persona->peso<50);
        if($persona->peso<50||$mayor||$menor)
        {
          $persona->estado=0;
        }else{
          $persona->estado=1;
        }
        $persona->save();  
        return redirect()->to(mid().'/persona?search='.$persona->cui);

        return "update";    
   }
public function destroy($id)
   {
        return "destroy";    
   }

}
