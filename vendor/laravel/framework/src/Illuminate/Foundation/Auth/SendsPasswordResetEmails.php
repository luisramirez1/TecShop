<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Categorias;
use App\Marcas;
use App\Productos;
use App\Pro_Cal;
use DB;

trait SendsPasswordResetEmails
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
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
        $populares =DB::table('productos')
           ->where('calificacion', '>', 0)
           ->orderBy('calificacion', 'desc')
           ->limit('8')
           ->get();
        return view('auth.passwords.email', compact('categorias', 'marcas1', 'marcas2', 'celulares1', 'celulares2', 'electronica', 'consola', 'populares'));
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response));
        }

        // If an error was returned by the password broker, we will get this message
        // translated so we can notify a user of the problem. We'll redirect back
        // to where the users came from so they can attempt this process again.
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
}
