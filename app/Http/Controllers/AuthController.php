<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('registro');
    }

    public function showLogin()
    {

        return view('login');
    }

    public function register(Request $request)
    {

        /*
    |--------------------------------------------------------------------------
    | VALIDACIÓN
    |--------------------------------------------------------------------------
    */

        $request->validate([

            /*
    |--------------------------------------------------------------------------
    | NOMBRE
    |--------------------------------------------------------------------------
    */
            'name' => 'required|max:255',



            /*
    |--------------------------------------------------------------------------
    | APELLIDO
    |--------------------------------------------------------------------------
    */
            'apellido' => 'required|max:255',



            /*
    |--------------------------------------------------------------------------
    | USERNAME
    |--------------------------------------------------------------------------
    | unique:users
    | evita usernames repetidos
    |--------------------------------------------------------------------------
    */
            'username' => 'required|min:3|max:30|unique:users',



            /*
    |--------------------------------------------------------------------------
    | EMAIL
    |--------------------------------------------------------------------------
    | unique:users -> evita emails repetidos
    |
    | regex -> solo permite:
    | gmail.com
    | hotmail.com
    | outlook.com
    |--------------------------------------------------------------------------
    */
            'email' => [

                'required',

                'email',

                'unique:users',

                'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|outlook\.com)$/'

            ],



            /*
    |--------------------------------------------------------------------------
    | DIRECCIÓN
    |--------------------------------------------------------------------------
    */
            'direccion' => 'required|max:255',



            /*
    |--------------------------------------------------------------------------
    | CIUDAD
    |--------------------------------------------------------------------------
    */
            'ciudad' => 'required|max:255',



            /*
    |--------------------------------------------------------------------------
    | PAÍS
    |--------------------------------------------------------------------------
    */
            'pais' => 'required|max:255',



            /*
    |--------------------------------------------------------------------------
    | PASSWORD
    |--------------------------------------------------------------------------
    | confirmed:
    | compara password con password_confirmation
    |--------------------------------------------------------------------------
    */
            'password' => 'required|min:8|confirmed'

        ]);



        /*
    |--------------------------------------------------------------------------
    | CREAR USUARIO
    |--------------------------------------------------------------------------
    */

        User::create([

            /*
    |--------------------------------------------------------------------------
    | DATOS PERSONALES
    |--------------------------------------------------------------------------
    */

            'name' => $request->name,

            'apellido' => $request->apellido,



            /*
    |--------------------------------------------------------------------------
    | USERNAME
    |--------------------------------------------------------------------------
    */

            'username' => $request->username,



            /*
    |--------------------------------------------------------------------------
    | EMAIL
    |--------------------------------------------------------------------------
    */

            'email' => $request->email,



            /*
    |--------------------------------------------------------------------------
    | DIRECCIÓN
    |--------------------------------------------------------------------------
    */

            'direccion' => $request->direccion,

            'ciudad' => $request->ciudad,

            'pais' => $request->pais,



            /*
    |--------------------------------------------------------------------------
    | PASSWORD
    |--------------------------------------------------------------------------
    | Hash::make()
    | encripta la contraseña.
    |--------------------------------------------------------------------------
    */

            'password' => Hash::make($request->password),



            /*
    |--------------------------------------------------------------------------
    | ROLE
    |--------------------------------------------------------------------------
    | Todos los nuevos usuarios:
    | customer
    |--------------------------------------------------------------------------
    */

            'role' => 'customer'

        ]);




        /*
    |--------------------------------------------------------------------------
    | REDIRECCIÓN
    |--------------------------------------------------------------------------
    */

        return redirect('/login');
    }

   public function login(Request $request)
{
    // 1. Validar los datos de entrada (si ya lo tenías, déjalo igual)
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // 2. Buscar si existe un usuario con ese email, INCLUYENDO los desactivados
    $usuario = User::withTrashed()->where('email', $request->email)->first();

    // 3. Comprobar si el usuario existe y si está desactivado (Soft Deleted)
    if ($usuario && $usuario->trashed()) {
        // Retornamos hacia atrás con el mensaje de error específico
        return back()->withErrors([
            'email' => 'Has sido desactivado por los administradores.'
        ]);
    }

    // 4. Si no está desactivado, procedemos con el login normal
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        
        // Redirigir a donde corresponda
        return redirect()->intended('/catalogo'); 
    }

    // Si la contraseña es incorrecta (pero la cuenta está activa)
    return back()->withErrors([
        'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ]);
}
}
