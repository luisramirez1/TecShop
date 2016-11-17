<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use App\Productos;
use App\Categorias;
use App\Pro_Cate;

class ProductosController extends Controller
{
    public function registrarV()
    {
    	$categorias= Categorias::all();
        return view('/registrarProductos', compact('categorias'));
    }

    public function registrar(Request $datos){
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
    	$nuevo->imagen=$nombre;
        $nuevo->imagen2=$nombre2;
    	$nuevo->save();

    	return Redirect('/registrarProductos');
    }

    public function registrarCV()
    {
        $categorias = Categorias::all();
        return view('/registrarCategorias', compact('categorias'));
    }

    public function registrarC(Request $datos){
    	$nuevo = new Categorias;
    	$nuevo->name=$datos->input('name');
    	$nuevo->save();

    	return Redirect('/registrarCategorias');
    }
}
