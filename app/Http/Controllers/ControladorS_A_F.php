<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorS_A_F extends Controller
{
    public function procesar(Request $request)
    {
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $mensaje = $request->input('mensaje');
        return view('exito', [
            'nombre' => $nombre,
            'email' => $email,
        ]);
    }
}
