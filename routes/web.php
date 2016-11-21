<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Categorias;

Route::get('/', function () {
	$categorias = Categorias::all();
    return view('inicio', compact('categorias'));
});

Auth::routes();

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::group(['middleware' => ['admin']], function () {

	Route::get('/registrarProductos', 'ProductosController@registrarV');
	Route::post('/guardarProductos', 'ProductosController@registrar');
	Route::get('/registrarCategorias', 'ProductosController@registrarCV');
	Route::post('/guardarCategorias', 'ProductosController@registrarC');
	Route::get('/registrarMarcas','ProductosController@registrarMarcaV');
	Route::post('/guardarMarcas','ProductosController@registrarM');		
});

Route::group(['middleware' => ['auth']], function () {
	Route::get('/editar/{id}', 'HomeController@editar');
	Route::post('/actualizar/{id}', 'HomeController@actualizar');
});