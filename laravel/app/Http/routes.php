<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	if(Auth::guest()){
    	return view('welcome');
    }else{
            return redirect()->to('admin');
        }
});


Route::auth();




if(Auth::guest()){
Route::get('/register',  function () {
    return view('welcome');
});
}
Route::get('/home', 'HomeController@index');
/*App:missing(function($exeption){
	return view('404');
});*/
Route::group(['middleware'=>['auth','administrador'],'prefix'=>'admin'],function(){
	/*REPORTE y Graficas*/
	Route::get('/reportes', 'rptPersona\rptPersonaController@reportes');
	Route::get('/gUnidades', 'rptPersona\rptPersonaController@gUnidades');
	Route::get('/gDonantes', 'rptPersona\rptPersonaController@gDonantes');
	Route::get('/gTransacciones', 'rptPersona\rptPersonaController@gTransacciones');
	Route::resource('rptPersona', 'rptPersona\rptPersonaController');

	/*Rutas de formularios para Sesion de Usuario*/
	Route::get('/', 'usuarios\usuariosController@index');	
	Route::resource('usuarios', 'usuarios\usuariosController');
	Route::resource('personas', 'personas\personasController');
	Route::post('/usuarios/{id}/edit', 'usuarios\usuariosController@guardar');	
	/*Rutas de formularios para catalogos*/
		Route::get('/catalogos/{catalogo}', 'catalogos\catalogosController@index')->name('admin.catalogos.index');
		Route::post('/catalogos/{catalogo}', 'catalogos\catalogosController@store')->name('admin.catalogos.store');
		Route::get('/catalogos/{catalogo}/create', 'catalogos\catalogosController@create')->name('admin.catalogos.create');
		Route::get('/catalogos/{catalogo}/{id}/show', 'catalogos\catalogosController@show')->name('admin.catalogos.show');
		Route::get('/catalogos/{catalogo}/{id}/edit', 'catalogos\catalogosController@edit')->name('admin.catalogos.edit');
		Route::put('/catalogos/{catalogo}/{id}/update', 'catalogos\catalogosController@update')->name('admin.catalogos.update');
	/*Rutas de formularios para PERSONA*/
		Route::resource('persona', 'personas\personaController');
		Route::get('persona/busqueda', 'personas\personaController@busqueda');
		Route::get('persona/{id}/afeccionAdd', 'personas\personaController@afeccionGet');
		Route::post('persona/{id}/afeccionAdd', 'personas\personaController@afeccionAdd');
		Route::delete('persona/{idp}/afeccionEliminar/{ida}', 'personas\personaController@afeccionEliminar');
	/*Rutas de formularios para USUARIo*/
		Route::resource('usuario', 'usuarios\usuarioController');
		Route::get('usuario/busqueda', 'usuarios\usuarioController@busqueda');
	/*Rutas de formularios para SANGRE*/
		Route::resource('sangre', 'sangre\sangreController');
		Route::get('sangre/create/minimo', 'sangre\sangreController@valida');
		Route::post('sangre/create/minimo', 'sangre\sangreController@validaMin');
	/*Rutas de formularios para Unidad */
		Route::resource('unidad', 'sangre\unidadController');
	/*Rutas de formularios para transacciones*/
		Route::resource('transaccion', 'transaccion\transaccionController');
		Route::get('transaccion/create/valida', 'transaccion\transaccionController@valida');
		Route::post('transaccion/create/valida', 'transaccion\transaccionController@create');
		Route::get('transaccion/create/valida/retiro', 'transaccion\transaccionController@validaRetiro');
		Route::post('transaccion/create/valida/retiro', 'transaccion\transaccionController@createRetiro');
		Route::post('transaccion/create/storeRetiro', 'transaccion\transaccionController@storeRetiro');
		

});
Route::group(['middleware'=>['auth','encargado'],'prefix'=>'encargado'],function(){
	/*REPORTE y Graficas*/
		Route::get('/reportes', 'rptPersona\rptPersonaController@reportes');
		Route::get('/gUnidades', 'rptPersona\rptPersonaController@gUnidades');
		Route::get('/gDonantes', 'rptPersona\rptPersonaController@gDonantes');
		Route::get('/gTransacciones', 'rptPersona\rptPersonaController@gTransacciones');
		Route::resource('rptPersona', 'rptPersona\rptPersonaController');
	/*Rutas de formularios para Sesion de Usuario*/
		Route::get('/', 'usuarios\usuariosController@index');	
		Route::resource('usuarios', 'usuarios\usuariosController');
		Route::resource('personas', 'personas\personasController');
		Route::post('/usuarios/{id}/edit', 'usuarios\usuariosController@guardar');	
	/*Rutas de formularios para PERSONA*/
		Route::resource('persona', 'personas\personaController');
		Route::get('persona/busqueda', 'personas\personaController@busqueda');
		Route::get('persona/{id}/afeccionAdd', 'personas\personaController@afeccionGet');
		Route::post('persona/{id}/afeccionAdd', 'personas\personaController@afeccionAdd');
		Route::delete('persona/{idp}/afeccionEliminar/{ida}', 'personas\personaController@afeccionEliminar');
	
	/*Rutas de formularios para SANGRE*/
		Route::resource('sangre', 'sangre\sangreController');
		Route::get('sangre/create/minimo', 'sangre\sangreController@valida');
		Route::post('sangre/create/minimo', 'sangre\sangreController@validaMin');
	/*Rutas de formularios para Unidad */
		Route::resource('unidad', 'sangre\unidadController');
	/*Rutas de formularios para transacciones*/
		Route::resource('transaccion', 'transaccion\transaccionController');
		Route::get('transaccion/create/valida', 'transaccion\transaccionController@valida');
		Route::post('transaccion/create/valida', 'transaccion\transaccionController@create');
		Route::get('transaccion/create/valida/retiro', 'transaccion\transaccionController@validaRetiro');
		Route::post('transaccion/create/valida/retiro', 'transaccion\transaccionController@createRetiro');
		Route::post('transaccion/create/storeRetiro', 'transaccion\transaccionController@storeRetiro');

});
Route::group(['middleware'=>['auth','usuario'],'prefix'=>'usuario'],function(){
	/*REPORTE y Graficas*/
		Route::get('/reportes', 'rptPersona\rptPersonaController@reportes');
		Route::get('/gUnidades', 'rptPersona\rptPersonaController@gUnidades');
		Route::get('/gDonantes', 'rptPersona\rptPersonaController@gDonantes');
		Route::get('/gTransacciones', 'rptPersona\rptPersonaController@gTransacciones');
		Route::resource('rptPersona', 'rptPersona\rptPersonaController');
	/*Rutas de formularios para Sesion de Usuario*/
		Route::get('/', 'usuarios\usuariosController@index');	
		Route::resource('usuarios', 'usuarios\usuariosController');
		Route::resource('personas', 'personas\personasController');
		Route::post('/usuarios/{id}/edit', 'usuarios\usuariosController@guardar');		
});