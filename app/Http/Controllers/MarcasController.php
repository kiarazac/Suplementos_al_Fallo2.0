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
        return view('marcas.create');
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
        return redirect()->route('marcas.index'); 
    }

    public function edit(string $id)
    {
        $marca = Marca::findOrFail($id);
        return view('marcas.edit', compact('marca'));
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

        // CORRECCIÓN: marcas.index
        return redirect()->back();
    }
public function activate(string $id)
    {
        // 1. Buscamos la marca por su ID
        $marca = Marca::findOrFail($id);

        // 2. Simplemente la actualizamos forzando el 1 (activar)
        $marca->update([
            'activo' => 1
        ]);

        // 3. Recargamos la página
        return redirect()->back();
    }
    public function destroy(string $id)
    {
        $marca = Marca::findOrFail($id);

        $marca->update([
            'activo' => 0
        ]);

        // CORRECCIÓN: marcas.index
        return redirect()->back();
    }
}