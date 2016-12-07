<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use App\Productos;
use App\Categorias;
use App\Pro_Car;
use App\Marcas;
use App\Pro_Cal;
use App\Comentarios;
use App\Usuarios;
use App\Compras;
use App\ResProductos;
use Illuminate\Support\Facades\Mail;
use App\Mail\comprasTecShop;
use Session;

class MarcasController extends Controller
{
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
        $usuario = Auth::user()->id;
        $cantidadPro=DB::table('pro_car')
            ->where('id_usuario', '=', $usuario)
            ->sum('cantidad');
        $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
        return view('/registrarMarcas', compact('categorias', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'cantidadPro', 'cantidadPagar'));
    }

    public function registrarM(Request $datos) {
        $nuevo = new Marcas();
        $nuevo->name=$datos->input('name');
        $nuevo->categoria=$datos->input('categoria');
        $nuevo->save();

        return Redirect('/registrarMarcas');
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
        $interesar=DB::table('productos')
            ->limit('1')
            ->inRandomOrder()
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
          $cali=DB::table('pro_cal AS pc')
            ->join('productos AS p', 'pc.id_pro', '=', 'p.id')
            ->where('p.marca', '=', $id)
            ->where('pc.id', '=', $usuario)
            ->select('pc.calificacion', 'p.id')
            ->get();
        }
        return view('/marcas', compact('categorias', 'productoss', 'marcas', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'interesar', 'cantidadPro', 'cantidadPagar', 'cali'));
    }
}
