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
        $usuario = Auth::user()->id;
        $cantidadPro=DB::table('pro_car')
            ->where('id_usuario', '=', $usuario)
            ->sum('cantidad');
        $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
      return view('/consultaUsuarios', compact('categorias', 'marca', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'usuarios', 'cantidadPro', 'cantidadPagar'));
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
        $usuario = Auth::user()->id;
        $cantidadPro=DB::table('pro_car')
            ->where('id_usuario', '=', $usuario)
            ->sum('cantidad');
        $cantidadPagar=DB::table('pro_car')
          ->where('id_usuario', '=', $usuario)
          ->sum('totalapagar');
        return view('/registrarCategorias', compact('categorias', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'cantidadPro', 'cantidadPagar'));
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
        $marcas = Marcas::all();
        $productos=DB::table('productos')
            ->where('categoria', '=', $id)
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
        }

        return view('/categorias', compact('categorias', 'productos', 'marcas', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'interesar', 'cantidadPro', 'cantidadPagar'));
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
        }
        return view('/marcas', compact('categorias', 'productoss', 'marcas', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'interesar', 'cantidadPro', 'cantidadPagar'));
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
        }
        return view('/vistaRapida', compact('categorias', 'productoss', 'marcas', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'productoVR', 'comentario', 'comentarioV', 'usuarioC', 'relacionados', 'cantidadPro', 'cantidadPagar'));
    }

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
          $nuevo->save();
          $producto->save();
          return back()->withInput();
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

          return back()->withInput();
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
        return back();
    }
}
