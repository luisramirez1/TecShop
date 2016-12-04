<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use App\Usuarios;
use App\Categorias;
use App\Marcas;
use App\Productos;
use App\Comentarios;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('/');
    }

    public function editar($id)
    {
        $usuarios = Usuarios::find($id);
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
        return view('/editar', compact('usuarios', 'categorias', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'cantidadPro', 'cantidadPagar'));
    }

    public function actualizar($id, Request $datos){
        $nuevo = usuarios::find($id);
        //$tipo = Poke_Tipo::find($id);  
        $file = Input::file('imagen');
        $nombre = $file->getClientOriginalName();
        $tipos = $datos->input("tipo");
        $file->move('images/usuarios', $nombre);
        $nuevo->name=$datos->input('name');
        $nuevo->email=$datos->input('email');
        $nuevo->facebook=$datos->input('facebook');
        $nuevo->tel=$datos->input('tel');
        $contraseña = bcrypt($datos['password']);
        //bcrypt('sanz123')
        $nuevo->password= $contraseña;
        $nuevo->imagen=$nombre;
        //$tipo->id=$datos->input('numeroPokemon');
        //$tipo->id_tipo=$datos->input('tipo');
        $nuevo->save();
        //$tipo->save();

        return Redirect('/');
    }

    public function comentario($idU, $idP, Request $datos){
        $nuevo = new Comentarios;
        $nuevo->comentario=$datos->input('comentario');
        $nuevo->id_usuario=$idU;
        $nuevo->id_pro=$idP;
        $nuevo->save();
        return back()->withInput();
    }
}
