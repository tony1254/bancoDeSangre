<?php

namespace App\Http\Controllers\catalogos;

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

class catalogosController extends Controller
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

  
public function index($catalogo)
    {
       $datos=datosCatalogo($catalogo);
$usuario=Auth::user();
 $mid=mid();
       
        return view('catalogos/index', ['datos' => $datos,'catalogo' => $catalogo,'usuario'=>$usuario,'mid'=>$mid]);
           


    }     
public function show($id)
    {
        return "show";

    }  
public function edit($catalogo,$id)
    {
     $datos=datoCatalogo($catalogo,$id);
        return view('catalogos/edit', ['datos' => $datos,'catalogo' => $catalogo]);


    }  
public function update($catalogo,$id, Request $request)
    {
        $datos=datoCatalogo($catalogo,$id);
        $datos->nombre=$request->input('nombre');
        $datos->save();
        return redirect()->to(mid().'/catalogos/'.$catalogo);


    }  
public function create($catalogo)
    {
$usuario=Auth::user();
       
$mid=mid();
        return view('catalogos/create', ['catalogo' => $catalogo,'usuario'=>$usuario,'mid'=>$mid]);

        

    }  
public function store($catalogo, Request $request)
    {
        
        $datos=nuevoCatalogo($catalogo);
        $datos->nombre=$request->input('nombre');
        $datos->save();
        return redirect()->to(mid().'/catalogos/'.$catalogo);

    }  

}