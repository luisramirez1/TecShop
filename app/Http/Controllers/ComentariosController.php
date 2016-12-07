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

class ComentariosController extends Controller
{
    public function editarComentarioV($id) {
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
            ->where('categoria', '=', $id)
            ->get();
        $comentario = DB::select("SELECT id, comentario FROM comentarios WHERE id = $id LIMIT 1");
        $usuario = Auth::user()->id;
        $cantidadPro=DB::table('pro_car')
            ->where('id_usuario', '=', $usuario)
            ->sum('cantidad');
        $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
        return view('/editarComentario', compact('categorias', 'productoss', 'marcas', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'comentario', 'cantidadPro', 'cantidadPagar'));
      }

      public function editarComentario($id, Request $datos){
        $comentario = $datos->input('comentario');
        $nuevo= Comentarios::where('id', $id)
          ->update(['comentario' => $comentario]);
        $id = comentarios::find($id);
        return redirect('/vistaRapida/' . $id->id_pro);
      }

      public function eliminarComentario($id){
        $nuevo= Comentarios::where('id', $id)
          ->delete();
        return back()->withInput();
      }
}
