<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Otorga el rol de admin a un usuario
    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();

        return back()->with('success', 'Usuario promovido a administrador exitosamente.');
    }

    // Quita el rol de admin y lo devuelve a customer
    public function removeAdmin(User $user)
    {
        // Medida de seguridad: Evitar que el admin activo se quite sus propios permisos
        if (Auth::id() === $user->id) {
            return back()->withErrors(['error' => 'No puedes quitarte el rol de administrador a ti mismo.']);
        }

        $user->role = 'customer';
        $user->save();

        return back()->with('success', 'El rol de administrador ha sido revocado.');
    }

    // Elimina a un usuario del sistema
    public function destroy(User $user)
    {
        // Medida de seguridad: Evitar que el admin se elimine a sí mismo por error
        if (Auth::id() === $user->id) {
            return back()->withErrors(['error' => 'No puedes eliminar tu propia cuenta desde aquí.']);
        }

        $user->delete();

        return back()->with('success', 'Usuario eliminado permanentemente.');
    }

    // Muestra el formulario para crear un nuevo administrador
public function createAdminForm()
{
    return view('panel_admin.create_admin'); 
}




// Registra un nuevo administrador directamente desde el panel
    public function storeAdmin(Request $request)
    {
        // 1. Validamos los datos (es la misma validación estricta de tu registro normal)
        $request->validate([
            'name' => 'required|max:255',
            'apellido' => 'required|max:255',
            'username' => 'required|min:3|max:30|unique:users',
            'email' => [
                'required', 'email', 'unique:users',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|outlook\.com)$/'
            ],
            'direccion' => 'required|max:255',
            'ciudad' => 'required|max:255',
            'pais' => 'required|max:255',
            'password' => 'required|min:8|confirmed'
        ]);

        // 2. Creamos al usuario con rol de ADMIN
        User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'username' => $request->username,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'pais' => $request->pais,
            'password' => Hash::make($request->password),
            'role' => 'admin' // <--- AQUÍ ESTÁ LA CLAVE
        ]);

        // 3. Volvemos al panel de control (y gracias a tu script de JS, volverá a la pestaña que estabas mirando)
        return redirect('/panel_admin')->with('success', 'Administrador creado exitosamente.');
    }
}

