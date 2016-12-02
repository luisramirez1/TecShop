<?php

namespace App\Mail;

use Auth;
use App\User;
use DB;
use App\Productos;
use App\Compras;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class comprasTecShop extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;

    public function __construct(User $user)
    {
        return $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $idU = Auth::user()->id;
        $idC = Auth::user()->compras + 1;
        $compra=DB::table('productos AS p')
            ->join('compras AS c', 'p.id', '=', 'c.id_pro')
            ->where('c.id_usuario', '=', $idU)
            ->where('c.compras', '=', $idC)
            ->get();
        $canti = $idC;
        $cantidadT=DB::table('compras')
            ->where('compras', '=', $idC)
            ->sum('totalapagar');
        return $this->view('emails.compras', compact('compra', 'canti', 'cantidadT'));
    }
}
