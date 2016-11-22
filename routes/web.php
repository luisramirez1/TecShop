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
use App\Marcas;
use App\Productos;


Route::get('/', function () {
	$categorias = Categorias::all();

	$marcas1 =DB::table('marcas')
           ->where('categoria', '=', 2)
           ->limit('6')
           ->get();
    $marcas2 =DB::table('marcas')
           ->where('categoria', '=', 2)
           ->orderBy('id', 'desc')
           ->limit('5')
           ->get();
    $celulares1 =DB::table('marcas')
           ->where('categoria', '=', 1)
           ->limit('6')
           ->get();
    $celulares2 =DB::table('marcas')
           ->where('categoria', '=', 1)
           ->orderBy('id', 'desc')
           ->limit('2')
           ->get();
    $electronica =DB::table('marcas')
           ->where('categoria', '=', 4)
           ->limit('4')
           ->get();
    $consola =DB::table('marcas')
           ->where('categoria', '=', 3)
           ->limit('4')
           ->get();
    return view('inicio', compact('categorias', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola'));


});

Auth::routes();

Route::get('/categorias/{id}','ProductosController@categorias');
Route::get('/marcas/{id}','ProductosController@marcas');
Route::get('/vistaRapida/{id}','ProductosController@vistaRapida');
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::group(['middleware' => ['admin']], function () {

	Route::get('/registrarProductos', 'ProductosController@registrarV');
	Route::post('/guardarProductos', 'ProductosController@registrar');
	Route::get('/registrarCategorias', 'ProductosController@registrarCV');
	Route::post('/guardarCategorias', 'ProductosController@registrarC');
  Route::post('/calificacion/{id}', 'ProductosController@calificacion');
	Route::get('/registrarMarcas','ProductosController@registrarMarcaV');
	Route::post('/guardarMarcas','ProductosController@registrarM');
  Route::get('/editarComentarioV/{id}','ProductosController@editarComentarioV');
  Route::get('/eliminarComentario/{id}','ProductosController@eliminarComentario');
  Route::post('/editarComentario/{id}','ProductosController@editarComentario');


});

Route::group(['middleware' => ['auth']], function () {
	Route::get('/editar/{id}', 'HomeController@editar');
	Route::post('/actualizar/{id}', 'HomeController@actualizar');
  Route::post('/comentar/{idU}/{idP}', 'HomeController@comentario');
});