<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcasController extends Controller
{
    public function index(Request $request)
    {
        $query = Marca::query();

        if ($request->has('activo') && $request->activo !== null) {
            $query->where('activo', $request->activo);
        }

        $marcas = $query->get();

        return view('marcas.indexMarcas', compact('marcas'));
    }

    public function create()
    {
        return redirect('/panel_admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'activo' => 'boolean',
        ]);

        Marca::create([
            'nombre' => $request->nombre,
            'activo' => $request->activo,
        ]);

        // CORRECCIÓN: El nombre estándar que genera Route::resource es marcas.index
        return redirect('/panel_admin');
        // (Aplica esto en store, update, activate y destroy del MarcasController)
    }

    public function edit(string $id)
    {
        return redirect('/panel_admin');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'activo' => 'boolean',
        ]);

        $marca = Marca::findOrFail($id);

        $marca->update([
            'nombre' => $request->nombre,
            'activo' => $request->activo,
        ]);

        return redirect('/panel_admin');
        // (Aplica esto en store, update, activate y destroy del MarcasController)
    }
    public function activate(string $id)
    {
        // 1. Buscamos la marca por su ID
        $marca = Marca::findOrFail($id);

        // 2. Simplemente la actualizamos forzando el 1 (activar)
        $marca->update([
            'activo' => 1
        ]);

        return redirect('/panel_admin');
        // (Aplica esto en store, update, activate y destroy del MarcasController)
    }
    public function destroy(string $id)
    {
        $marca = Marca::findOrFail($id);

        $marca->update([
            'activo' => 0
        ]);


        return redirect('/panel_admin');
        // (Aplica esto en store, update, activate y destroy del MarcasController)
    }
}
