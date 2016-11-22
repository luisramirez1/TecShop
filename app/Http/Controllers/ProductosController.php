<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use App\Productos;
use App\Categorias;
use App\Pro_Cate;
use App\Marcas;
use App\Usuarios;

class ProductosController extends Controller {

    public function eliminar($id) {
        Usuarios::find($id)->delete();
        return Redirect('consultaUsuarios');
    }


    public function consultarU() {
        $categorias= Categorias::all();
        $marca= Marcas::all();
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
        $usuarios =DB::table('users')
           ->where('tipoUsuario', '=', 2)
           ->get();
      return view('/consultaUsuarios', compact('categorias', 'marca', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'usuarios'));
    }
    
    public function registrarV() {
    	$categorias= Categorias::all();
        $marca= Marcas::all();
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
        return view('/registrarProductos', compact('categorias', 'marca', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola'));
    }

    public function registrar(Request $datos) {
    	$nuevo = new Productos;
        $procate = new Pro_Cate;
        $file = Input::file('imagen');
        $nombre = $file->getClientOriginalName();
        $file->move('images/productos', $nombre);
        $file2 = Input::file('imagen2');
        $nombre2 = $file2->getClientOriginalName();
        $file2->move('images/productos', $nombre2);
    	$nuevo->name=$datos->input('name');
    	$nuevo->precio=$datos->input('precio');
    	$nuevo->descripcion=$datos->input('descripcion');
        $nuevo->categoria=$datos->input('categoria');
        $nuevo->marca=$datos->input('marca');
    	$nuevo->imagen=$nombre;
        $nuevo->imagen2=$nombre2;
    	$nuevo->save();

    	return Redirect('/registrarProductos');
    }



    public function registrarCV() {
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
        return view('/registrarCategorias', compact('categorias', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola'));
    }

    public function registrarC(Request $datos){
    	$nuevo = new Categorias;
    	$nuevo->name=$datos->input('name');
    	$nuevo->save();

    	return Redirect('/registrarCategorias');
    }

    public function registrarMarcaV() {
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
        return view('/registrarMarcas', compact('categorias', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola'));
    }

    public function registrarM(Request $datos) {
        $nuevo = new Marcas();
        $nuevo->name=$datos->input('name');
        $nuevo->save();

        return Redirect('/registrarMarcas');


    }

    public function categorias($id) {
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
        $productos = Productos::all();
        $marcas = Marcas::all();
        $productos=DB::table('productos')
            ->where('categoria', '=', $id)
            ->get();
        $iphone = Productos::find(33);
        return view('/categorias', compact('categorias', 'productos', 'marcas', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'iphone'));
    }

    public function marcas($id) {
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
        $productos = Productos::all();
        $marcas = Marcas::all();
        $productoss=DB::table('productos')
            ->where('marca', '=', $id)
            ->get();
        $iphone = Productos::find(33);
        return view('/marcas', compact('categorias', 'productoss', 'marcas', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'iphone'));
    }

    public function vistaRapida($id) {
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
        $productos = Productos::all();
        $marcas = Marcas::all();
        $productoss=DB::table('productos')
            ->where('marca', '=', $id)
            ->get();
        $productoVR= Productos::find($id);
        
        return view('/vistaRapida', compact('categorias', 'productoss', 'marcas', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'productoVR'));
    }

}
