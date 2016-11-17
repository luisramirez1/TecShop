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
    return view('principal', compact('categorias'));
});

Auth::routes();

<<<<<<< HEAD
Route::get('/editar/{id}', 'HomeController@editar');
Route::post('/actualizar/{id}', 'HomeController@actualizar');

Route::get('/acercade','HomeController@acerca');
Route::get('/contactanos','HomeController@contactanos');
Route::get('/preguntasFrecuentes','HomeController@FAQs');
=======
Route::group(['middleware' => ['admin']], function () {

	Route::get('/registrarProductos', 'ProductosController@registrarV');
	Route::post('/guardarProductos', 'ProductosController@registrar');
	Route::get('/registrarCategorias', 'ProductosController@registrarCV');
	Route::post('/guardarCategorias', 'ProductosController@registrarC');		
});
>>>>>>> 37b8793f53dabeb7af06d9aeb84b2d068384bdd5

Route::group(['middleware' => ['auth']], function () {
	Route::get('/editar/{id}', 'HomeController@editar');
	Route::post('/actualizar/{id}', 'HomeController@actualizar');
});