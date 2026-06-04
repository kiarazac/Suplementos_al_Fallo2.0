<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class categoriasController extends Controller
{
    // El index viejo lo podemos dejar por si en el futuro lo necesitas para una API, 
    // pero ya no se va a usar para la pantalla principal.
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
        return redirect('/panel_admin');
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

        // Redirige al panel maestro
        return redirect('/panel_admin'); 
    }

    public function edit(string $id)
    {
        return redirect('/panel_admin');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombreCategoria' => 'required|max:255',
            'activa' => 'boolean',
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'nombreCategoria' => $request->nombreCategoria,
            'activa' => $request->activa,
        ]);

        // Redirige al panel maestro
        return redirect('/panel_admin');
    }

    public function activate(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'activa' => 1
        ]);

        // Redirige al panel maestro
        return redirect('/panel_admin');
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'activa' => 0
        ]);

        // Redirige al panel maestro
        return redirect('/panel_admin');
    }
}