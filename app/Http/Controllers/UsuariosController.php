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

class UsuariosController extends Controller
{
    public function eliminar($id) {
        Usuarios::find($id)->delete();
        return Redirect('consultaUsuarios');
    }

    public function eliminarUI($id) {
        Usuarios::find($id)->delete();
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
        $usuario = Auth::user()->id;
        $cantidadPro=DB::table('pro_car')
            ->where('id_usuario', '=', $usuario)
            ->sum('cantidad');
        $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
      return view('/consultaUsuarios', compact('categorias', 'marca', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'usuarios', 'cantidadPro', 'cantidadPagar'));
    }

    public function vistaRapidaU($id) {
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
        $usuarios =Usuarios::find($id);
        $usuario = Auth::user()->id;
        $cantidadPro=DB::table('pro_car')
            ->where('id_usuario', '=', $usuario)
            ->sum('cantidad');
        $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
        $usuarioC=DB::table('productos AS p')
            ->join('pro_cal AS pc', 'p.id', '=', 'pc.id_pro')
            ->where('pc.id', '=', $id)
            ->get();
        $usuarioCom=DB::table('productos AS p')
            ->join('pro_car AS pc', 'p.id', '=', 'pc.id_pro')
            ->where('pc.id_usuario', '=', $id)
            ->get();
        $compra=DB::table('resproductos AS p')
            ->join('compras AS c', 'p.id', '=', 'c.id_pro')
            ->where('c.id_usuario', '=', $id)
            ->get();
        $compraC=DB::table('compras')
            ->where('id_usuario', '=', $id)
            ->count();

      return view('/vistaRapidaU', compact('categorias', 'marca', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'usuarios', 'cantidadPro', 'cantidadPagar', 'usuarioC', 'usuarioCom', 'compra', 'compraC'));
    }
}
