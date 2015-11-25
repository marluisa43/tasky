<?php
#Todos los id tienen que ser númericos
Route::pattern('id','[0-9]+');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
# Ya venga de un get o de un post, carga la página inicial
Route::any('/', function(){	return View::make('index');});

// Para la ruta de la api
Route::get('api/{appid}/{id}','TaskController@getApi');

# Todas las rutas que pueden acceder los invitados
Route::group(array('before'=>'guest'),function(){
	Route::get('registro','UserController@getRegistro');
	Route::get('login','UserController@getLogin');
	Route::get('recordar','RemindersController@getRemind');
	Route::get('recuperar/{token}','RemindersController@getReset');
});

# Todas las rutas que pueden acceder las personas autentificadas
Route::group(array('before'=>'auth'),function(){
	Route::get('logout','UserController@getLogout');
	Route::get('lista','TaskController@getLista');
	Route::get('iniciar/{id}','TaskController@getIniciar');
	Route::get('completar/{id}','TaskController@getCompletar');
	Route::get('eliminar/{id}','TaskController@getEliminar');
	Route::get('contacto','UserController@getContacto');
});

# Filtra que el idima sea un texto en minúsculas, sino da un error.
Route::get('idioma/{idioma}',function($id){
	Session::put('lang',$id);
	return Redirect::back();
})->where('idioma','[a-z]+');

# Todas las rutas que pueden acceder los invitados y tienen la seguridad csrf
Route::group(array('before'=>'guest|csrf'), function(){
	Route::post('registro','UserController@postRegistro');
	Route::post('login','UserController@postLogin');
	Route::post('recordar','RemindersController@postRemind');
	Route::post('recuperar','RemindersController@postReset');
});

# Todas las rutas que pueden acceder los autentificados y tienen la seguridad csrf
Route::group(array('before'=>'auth|csrf'), function(){
	Route::post('nueva','TaskController@postNueva');
	Route::post('contacto','UserController@postContacto');
});