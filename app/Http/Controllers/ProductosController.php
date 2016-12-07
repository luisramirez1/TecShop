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


class ProductosController extends Controller {

       
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
        $usuario = Auth::user()->id;
        $cantidadPro=DB::table('pro_car')
            ->where('id_usuario', '=', $usuario)
            ->sum('cantidad');
        $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
        return view('/registrarProductos', compact('categorias', 'marca', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'cantidadPro', 'cantidadPagar'));
    }

    public function registrar(Request $datos) {
    	  $nuevo = new Productos;
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

    public function vistaRapida($id, $idC) {
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
        if (Auth::guest()){

        }else{
          $usuario = Auth::user()->id;
        }
        $query = DB::select("SELECT verified FROM pro_cal WHERE id_pro=23 AND id=7 LIMIT 1");
        $comentario = Comentarios::where(['id_pro' => $id])->count();
        $comentarioV=DB::table('comentarios')
            ->where('id_pro', '=', $id)
            ->get();
        $usuarioC=DB::table('users AS u')
            ->join('comentarios AS c', 'u.id', '=', 'c.id_usuario')
            ->where('c.id_pro', '=', $id)
            ->get();
        $relacionados=DB::table('productos')
            ->where('id', '!=', $id)
            ->where('categoria', '=',$idC)
            ->limit('4')
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
          $cali=DB::table('pro_cal')
            ->where('id', '=', $usuario)
            ->where('id_pro', '=', $id)
            ->limit('1')
            ->get();
          $cali2=DB::table('pro_cal AS pc')
            ->join('productos AS p', 'pc.id_pro', '=', 'p.id')
            ->where('p.categoria', '=', $idC)
            ->where('pc.id', '=', $usuario)
            ->select('pc.calificacion', 'p.id')
            ->get();
        $existe=Pro_Cal::where('id_pro', '=', $id)->where('id', '=',$usuario)->exists(); 
        }   
        return view('/vistaRapida', compact('categorias', 'productoss', 'marcas', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'productoVR', 'comentario', 'comentarioV', 'usuarioC', 'relacionados', 'cantidadPro', 'cantidadPagar', 'cali', 'existe', 'cali2'));
    }

      public function consultarP() {
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
        $productos = Productos::all();
        $usuario = Auth::user()->id;
        $cantidadPro=DB::table('pro_car')
            ->where('id_usuario', '=', $usuario)
            ->sum('cantidad');
        $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
      return view('/consultaProductos', compact('categorias', 'marca', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'productos', 'cantidadPro', 'cantidadPagar'));
    }

    public function editarProductoV($id) {
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
        $marca= Marcas::all();
        $producto = Productos::find($id);
        $usuario = Auth::user()->id;
        $cantidadPro=DB::table('pro_car')
            ->where('id_usuario', '=', $usuario)
            ->sum('cantidad');
        $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
                
        return view('/editarProducto', compact('categorias', 'producto', 'marcas', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'marca', 'cantidadPro', 'cantidadPagar'));
      }

      public function editarProducto($id,Request $datos) {
        $nuevo = Productos::find($id);
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

      return back()->withInput();
    }

    public function editarExistencia($id,Request $datos) {
        $nuevo = Productos::find($id);
        $exist = $nuevo->existencia;
        $nuevo->existencia=$exist + $datos->input('existencia');
        $nuevo->save();

      return back()->withInput();
    }

    public function eliminarProducto($id){
        $nuevo = Productos::find($id)->delete();
        return back()->withInput();
    }

    public function generarPDFCompras($idU, $idC){
        $compra=DB::table('resproductos AS p')
            ->join('compras AS c', 'p.id', '=', 'c.id_pro')
            ->where('c.id_usuario', '=', $idU)
            ->where('c.compras', '=', $idC)
            ->get();
        $canti = $idC;
        $cantidadT=DB::table('compras')
            ->where('id_usuario', '=', $idU)
            ->where('compras', '=', $idC)
            ->sum('totalapagar');
        $vista=view('generarPDFCompras', compact('compra','canti','cantidadT'));
        $dompdf=\App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream("TecShop_Compra.pdf");
    }

}
