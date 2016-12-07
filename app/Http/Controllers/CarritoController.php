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

class CarritoController extends Controller
{
    public function carritoV($id){
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
      $carrito =DB::table('pro_car')
           ->where('id_usuario', '=', $id)
           ->get();
      $carrito=DB::table('productos AS p')
            ->join('pro_car AS pc', 'p.id', '=', 'pc.id_pro')
            ->where('pc.id_usuario', '=', $id)
            ->get();
      $cantidad=DB::table('pro_car')
              ->where('id_usuario', '=', $id)
              ->sum('cantidad');
      $usuario = Auth::user()->id;
      $cantidadPro=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('cantidad');
      $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
        return view('/carrito', compact('categorias', 'marca', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'carrito', 'cantidad', 'cantidadPro', 'cantidadPagar'));
    }

    public function agregarCarrito($id, Request $datos) {
        $nuevo = new Pro_Car;
        $producto = Productos::find($id);
        $usuario = Auth::user()->id;
        $precio= $producto->precio;
        $exis = $producto->existencia;
        $total= $datos->input('cantidad') * $precio;
        $exists=Pro_Car::where('id_pro', '=', $id)->where('id_usuario', '=',$usuario)->exists();
        if(!$exists){
          $nuevo->id_usuario=$usuario;
          $nuevo->id_pro=$id;
          $nuevo->cantidad=$datos->input('cantidad');
          $producto->existencia= $exis - $datos->input('cantidad');
          $nuevo->totalapagar=$total;
          $nuevo->compras= Auth::user()->compras + 1;
          $nuevo->save();
          $producto->save();
          return back()->with('status', ' Producto agregado al carrito.');
        }else{
          $idpro_car=Pro_Car::where('id_pro', '=', $id)->where('id_usuario', '=',$usuario)->limit(1)->get();
          foreach ($idpro_car as $i) {
            $canti2 = $i->cantidad;
            $producto->existencia= $exis - $i->cantidad;
          }
          $producto->save();
          $canti = $datos->input('cantidad') + $canti2;
          $total2 = $canti * $precio;
          $update=DB::table('pro_car')
              ->where('id_pro', '=', $id)
              ->where('id_usuario', '=',$usuario)
              ->update(['cantidad' => $canti, 'totalapagar' => $total2]);

          return back()->with('status', ' Cantidad de pedido actualizada.');
        }
      return back()->withInput();
    }

    public function eliminarCarri($id) {
        $nuevo = Pro_Car::find($id);
        $idPro = $nuevo->id_pro;
        $pro = Productos::find($idPro);
        $pro2 = $pro->existencia;
        $cantidad = $nuevo->cantidad;
        $canti = $pro2 + $cantidad;
        $nuevo =DB::table('productos')
              ->where('id', '=', $idPro)
              ->update(['existencia' => $canti]);
        Pro_Car::find($id)->delete();
        return back()->with('status', ' Producto eliminado del carrito Correctamente.');
    }
}
