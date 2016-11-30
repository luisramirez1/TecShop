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
use App\Pro_Cal;
use App\Pro_Car;

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
    $populares =DB::table('productos')
           ->where('calificacion', '>', 0)
           ->orderBy('calificacion', 'desc')
           ->limit('8')
           ->get();
    if(Auth::guest()){
    }else{
    $usuario = Auth::user()->id;
    $cantidadPro=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('cantidad');
    $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
    }
    
    

    return view('inicio', compact('categorias', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'populares', 'cantidadPro', 'cantidadPagar'));
});

Auth::routes();

Route::get('/categorias/{id}','ProductosController@categorias');
Route::get('/marcas/{id}','ProductosController@marcas');
Route::get('/vistaRapida/{id}/{idC}','ProductosController@vistaRapida');
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::group(['middleware' => ['admin']], function () {

	Route::get('/registrarProductos', 'ProductosController@registrarV');
	Route::post('/guardarProductos', 'ProductosController@registrar');
	Route::get('/registrarCategorias', 'ProductosController@registrarCV');
	Route::post('/guardarCategorias', 'ProductosController@registrarC');
	Route::get('/registrarMarcas','ProductosController@registrarMarcaV');
	Route::post('/guardarMarcas','ProductosController@registrarM');
  Route::get('/editarProductoV/{id}','ProductosController@editarProductoV');
  Route::post('/editarProducto/{id}','ProductosController@editarProducto');
  Route::post('/editarExistencia/{id}','ProductosController@editarExistencia');
  Route::get('/eliminarProducto/{id}','ProductosController@eliminarProducto');
  Route::get('/editarComentarioV/{id}','ProductosController@editarComentarioV');
  Route::get('/eliminarComentario/{id}','ProductosController@eliminarComentario');
  Route::post('/editarComentario/{id}','ProductosController@editarComentario');
  Route::get('/consultaProductos', 'ProductosController@consultarP');
  Route::get('/consultaUsuarios', 'ProductosController@consultarU');
  Route::get('/eliminarUsuarios/{id}', 'ProductosController@eliminar');
  Route::post('/importar','ExcelController@importar');
  Route::get('/exportar','ExcelController@exportar');
});

Route::group(['middleware' => ['auth']], function () {
  Route::post('/calificacion/{id}', 'ProductosController@calificacion');
	Route::get('/editar/{id}', 'HomeController@editar');
	Route::post('/actualizar/{id}', 'HomeController@actualizar');
  Route::post('/comentar/{idU}/{idP}', 'HomeController@comentario');
  Route::get('/carrito/{id}', 'ProductosController@carritoV');
  Route::post('/agregarCarrito/{id}', 'ProductosController@agregarCarrito');
  Route::get('/eliminarCarri/{id}', 'ProductosController@eliminarCarri');
});