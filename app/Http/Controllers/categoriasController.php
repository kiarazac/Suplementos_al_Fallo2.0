<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class categoriasController extends Controller
{

    public function index(Request $request) 
    {
        $query = Categoria::query();

        if ($request->has('activa') && $request->activa !== null) {
            $query->where('activa', $request->activa);
        }

        $categorias = $query->get();

        return view('categorias.indexCategorias', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreCategoria' => 'required|max:255',
            'activa' => 'boolean',
        ]);

        Categoria::create([
            'nombreCategoria' => $request->nombreCategoria,
            'activa' => $request->activa,
        ]);

        // CORRECCIÓN: El nombre estándar que genera Route::resource es categorias.index
        return redirect()->route('categorias.index'); 
    }

    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombreCategoria' => 'required|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'nombreCategoria' => $request->nombreCategoria,
        ]);

        // CORRECCIÓN: categorias.index
        return redirect()->route('categorias.index');
    }
public function activate(string $id)
    {
        // 1. Buscamos la categoria por su ID
        $categoria = Categoria::findOrFail($id);

        // 2. Simplemente la actualizamos forzando el 1 (activar)
        $categoria->update([
            'activa' => 1
        ]);

        // 3. Recargamos la página
        return redirect()->route('categorias.index');
    }
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'activa' => 0
        ]);

        // CORRECCIÓN: categorias.index
        return redirect()->route('categorias.index');
    }
}

