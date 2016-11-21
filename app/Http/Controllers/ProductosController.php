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

class ProductosController extends Controller {
    
    public function registrarV() {
    	$categorias= Categorias::all();
        $marca= Marcas::all();
        return view('/registrarProductos', compact('categorias', 'marca'));
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
        return view('/registrarCategorias', compact('categorias'));
    }

    public function registrarC(Request $datos){
    	$nuevo = new Categorias;
    	$nuevo->name=$datos->input('name');
    	$nuevo->save();

    	return Redirect('/registrarCategorias');
    }

    public function registrarMarcaV() {
        $categorias = Categorias::all();
        return view('/registrarMarcas', compact('categorias'));
    }

    public function registrarM(Request $datos) {
        $nuevo = new Marcas();
        $nuevo->name=$datos->input('name');
        $nuevo->save();

        return Redirect('/registrarMarcas');


    }

    public function categorias($id) {
        $categorias = Categorias::all();
        $productos = Productos::all();
        $marcas = Marcas::all();
        $productos=DB::table('productos')
            ->where('categoria', '=', $id)
            ->get();
        return view('/categorias', compact('categorias', 'productos', 'marcas'));
    }

    public function marcas($id) {
        $categorias = Categorias::all();
        $productos = Productos::all();
        $marcas = Marcas::all();
        $productoss=DB::table('productos')
            ->where('marca', '=', $id)
            ->get();
        $marcas1 =DB::table('marcas')
           ->where('categoria', '=', 2)
           ->limit('6')
           ->get();
        return view('/marcas', compact('categorias', 'productoss', 'marcas', 'marcas1'));
    }

}
