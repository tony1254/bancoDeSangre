<?php
 use App\CRol;
use App\User;
use App\CSexo;
use App\CAlmacen;
use App\CEstadoUnidad;
use App\CCongelador;
use App\CFactorSangre;
use App\CGrupoSangre;
use App\CTipoAfeccion;
use App\CTipoTransaccion;
use App\CHemoderivado;

use App\Persona;
function currentUser()
{
    return auth()->user();
}
/*Funcion para devolver el middleware donde se encuentra*/
function mid()
{
	$usuario=Auth::user();
	$mid='';
	if ($usuario->rol==1){
	$mid='admin';
	}elseif ($usuario->rol==2){
	$mid='encargado';
	}elseif ($usuario->rol==3){
	$mid='usuario';
	} 
    return $mid;
}
 /**
     ***CATALOGOS
     **1 sexo
     **2 rol
     **3 congelador
     **4 factorSangre
     **5 gurpoSangre
     **6 tipoAfeccion
     **7 estadoUnidad
     **8 tipoTransaccion
     */    
/*FUNCION para devolver los datos del catalogo solicitado*/
function datosCatalogo($catalogo)
{
 if($catalogo=="sexo"){
            $datos=CSexo::all();
        }else if($catalogo=="rol"){
            $datos=CRol::all();
        }else if($catalogo=="almacen"){
            $datos=CAlmacen::all();
        }else if($catalogo=="congelador"){
            $datos=CCongelador::all();
        }else if($catalogo=="factorSangre"){
            $datos=CFactorSangre::all();
        }else if($catalogo=="grupoSangre"){
            $datos=CGrupoSangre::all();
        }else if($catalogo=="tipoAfeccion"){
            $datos=CTipoAfeccion::all();
        }else if($catalogo=="estadoUnidad"){
            $datos=CEstadoUnidad::all();
        }else if($catalogo=="tipoTransaccion"){
            $datos=CTipoTransaccion::all();
        }else if($catalogo=="hemoderivado"){
            $datos=CHemoderivado::all();
        }else {
            return "index de else";
        }
        return $datos;
}
/*FUNCION para crear los datos del catalogo solicitado*/
function nuevoCatalogo($catalogo)
{
 if($catalogo=="sexo"){
            $datos=new CSexo;
        }else if($catalogo=="rol"){
            $datos=new CRol;
        }else if($catalogo=="almacen"){
            $datos=new CAlmacen;
        }else if($catalogo=="congelador"){
            $datos=new CCongelador;
        }else if($catalogo=="factorSangre"){
            $datos=new CFactorSangre;
        }else if($catalogo=="grupoSangre"){
            $datos=new CGrupoSangre;
        }else if($catalogo=="tipoAfeccion"){
            $datos=new CTipoAfeccion;
        }else if($catalogo=="estadoUnidad"){
            $datos=new CEstadoUnidad;
        }else if($catalogo=="tipoTransaccion"){
            $datos=new CTipoTransaccion;
        }else if($catalogo=="hemoderivado"){
            $datos=new CHemoderivado;
        }else {
            return "index de else";
        }
        return $datos;
}
/*FUNCION para devolver los datos del catalogo solicitado*/
function datoCatalogo($catalogo,$id)
{
		if($catalogo=="sexo"){
            $datos=CSexo::find($id);
        }else if($catalogo=="rol"){
            $datos=CRol::find($id);
        }else if($catalogo=="almacen"){
            $datos=CAlmacen::find($id);
        }else if($catalogo=="congelador"){
            $datos=CCongelador::find($id);
        }else if($catalogo=="factorSangre"){
            $datos=CFactorSangre::find($id);
        }else if($catalogo=="grupoSangre"){
            $datos=CGrupoSangre::find($id);
        }else if($catalogo=="tipoAfeccion"){
            $datos=CTipoAfeccion::find($id);
        }else if($catalogo=="estadoUnidad"){
            $datos=CEstadoUnidad::find($id);
        }else if($catalogo=="tipoTransaccion"){
            $datos=CTipoTransaccion::find($id);
        }else if($catalogo=="hemoderivado"){
            $datos=CHemoderivado::find($id);
        }else {
            return "index de else";
        }
        return $datos;
}
/*REFERENCIA SNAGUINEA
 Menos comunes: AB+ en un 3%, AB- 1%, el B+ en un 9% B- 2%, A- 6% y el O- 7% de la poblacion 

Mas común: O+ en un 39% y A+ en un 33% 

Mi tipo de sangre es A positivo. 

Las personas "O" puede donar sangre no solo a O sino a: A, B y AB porque aunque este tiene anticuerpo contra los grupos A y B no es una proporcion para destruir al grupo, son dadores universales. 

Las personas AB puede recibir no solo de AB sino de A,B y O, porque no tiene Anticuerpo contra estos grupos por tanto no los destruye, ellos son los receptores universales. 

En cuanto al factor Rh, los positivos pueden recibir de los negativos pero los negativos solo de los negativos porque estos poseen anticuerpos contra el positivo.


*/
/**
*Productos*

Sangre entera: bolsa de sangre de 450 mL que se conserva refrigerada con CPDA-1. Estas bolsas tienen una fecha de caducidad de 30 días tras la extracción.

Plasma fresco congelado: plasma obtenido antes de las 6 horas siguientes a la extracción sanguínea y que se mantiene a temperaturas inferiores a -18ºC, teniendo una caducidad de un año.

Plasma congelado: plasma que se obtiene a partir de una unidad de sangre que ha sido extraída en un período superior a 6 horas o bien, el plasma fresco que ha permanecido congelado más de un año y que tiene una caducidad de 4 años.

Concentrado de hematíes: obtenido tras la centrifugación de una unidad de sangre, desechando el plasma que queda en la parte superior. Puede ser usado durante los siguientes 30 días, manteniéndose entre 2-8 ºC.
*/

function tipoSangre($grupo,$factor){
    $color='green';
    
    if($grupo==3 & $factor==2){//       AB-     1%
    $color='green  darken-3';
    }else if($grupo==2 && $factor==2)// B-      2%
    {
         $color='green ';
    }else if($grupo==3 && $factor==1)// AB+     3%
    {
         $color='blue  darken-3';
    }else if($grupo==1 && $factor==2)// A-      6%
    {
         $color='blue ';
    }else if($grupo==4 && $factor==2)// O-      7%
    {
         $color='amber  darken-3';
    }else if($grupo==2 && $factor==1)// B+      9%
    {
         $color='amber ';
    }else if($grupo==1 && $factor==1)// A+      33%
    {
         $color='deep-orange  darken-3';
    }else if($grupo==4 && $factor==1)// O+      39%
    {
         $color='deep-orange ';
    }else{
         $color='purple';
    }

    $grupo=CGrupoSangre::find($grupo);
    $factor=CFactorSangre::find($factor);
if (empty($grupo)||empty($factor)) {
    return array('nombre' => 'N/A',
                 'color' => $color);
    
}
    return  array('nombre' => $grupo->nombre.$factor->nombre,
                 'color' => $color);
}