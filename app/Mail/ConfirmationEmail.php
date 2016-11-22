<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use App\Categorias;
use App\Marcas;

class ConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
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
        $this->user = $user, compact('categorias', 'marca', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola');
    }

   
    public function build() {

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
        return $this->view('emails.confirmation', compact('categorias', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola'));
    }
}
