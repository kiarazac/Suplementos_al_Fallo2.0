<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    // Guarda el mensaje del cliente
    public function enviar(Request $request)
    {
        // 1. Validar los datos
        $request->validate([
            'nombreCompleto' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'Mensaje' => 'required|string',
        ]);

        // 2. Guardar en la base de datos
        Consulta::create($request->all());

        // 3. Redirigir con un mensaje de éxito
        return back()->with('success', '¡Tu consulta ha sido enviada con éxito!');
    }

    // Muestra los mensajes al administrador
}