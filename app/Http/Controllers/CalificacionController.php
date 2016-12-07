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

class CalificacionController extends Controller
{
    public function calificacion($id, Request $datos) {
        $nuevo = new Pro_Cal;
        $usuario = Auth::user()->id;
        $producto = Productos::find($id);
        $cali=$datos->input('rating');
        $exists=Pro_Cal::where('id_pro', '=', $id)->where('id', '=',$usuario)->exists();
        if(!$exists){
          $nuevo->id = $usuario;
          $nuevo->id_pro=$id;
          $calificacion = $producto->calificacion;
          $nuevo->verified = true;
          $producto->calificacion = $calificacion + $datos->input('rating');
          $nuevo->calificacion=$datos->input('rating');
          $nuevo->save();
          $producto->save();
          return back()->withInput();
        }else{
          $update=DB::table('pro_cal')
              ->where('id_pro', '=', $id)
              ->where('id', '=',$usuario)
              ->update(['calificacion' => $cali]);
          $cali2=DB::table('pro_cal')
              ->where('id_pro', '=', $id)
              ->sum('calificacion');
          $update2=DB::table('productos')
              ->where('id', '=', $id)
              ->update(['calificacion' => $cali2]);
          return back()->withInput();

        }
          return back()->withInput();
    }        
}
