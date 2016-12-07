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

class ComprasController extends Controller
{
    public function comprar($id) {
        $usuario = Usuarios::find($id);
        $cP = $usuario->compras;
        $cF = $cP + 1;
        $update=DB::table('users')
              ->where('id', '=', $id)
              ->update(['compras' => $cF]);
        $query = DB::insert("INSERT INTO compras SELECT * from pro_car where id_usuario = $id");
        $idP = DB::table('pro_car')
              ->where('id_usuario', '=', $id)
              ->select('id_pro')
              ->get();
        foreach($idP as $i){
        $exists=resproductos::where('id', '=', $i->id_pro)->exists();
          if(!$exists){
            $queryP = DB::insert("INSERT INTO resproductos SELECT * from productos where id = $i->id_pro");
          }else{
          }
        }
        $delete =DB::table('pro_car')
              ->where('id_usuario', '=', $id)
              ->delete();
        Mail::to(Auth::user()->email)->send(new comprasTecShop(Auth::user()));
        return back()->withInput();  
    }

    public function compras($idU, $idC) {
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
        $usuarios =Usuarios::find($idU);
        $usuario = Auth::user()->id;
        $cantidadPro=DB::table('pro_car')
            ->where('id_usuario', '=', $usuario)
            ->sum('cantidad');
        $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
        $compra=DB::table('resproductos AS p')
            ->join('compras AS c', 'p.id', '=', 'c.id_pro')
            ->where('c.id_usuario', '=', $idU)
            ->where('c.compras', '=', $idC)
            ->get();
        $canti = $idC;
        $cantidadT=DB::table('compras')
            ->where('id_usuario', '=', $usuario)
            ->where('compras', '=', $idC)
            ->sum('totalapagar');
      return view('/compras', compact('categorias', 'marca', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'usuarios', 'cantidadPro', 'cantidadPagar', 'compra', 'canti', 'cantidadT'));
    }
}
