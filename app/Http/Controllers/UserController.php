<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}