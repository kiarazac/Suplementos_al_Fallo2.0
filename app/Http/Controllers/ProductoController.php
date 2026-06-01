<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        $marcas = Marca::all();

        return view(
            'productos.create',
            compact('categorias', 'marcas')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'nombre' => 'required|max:255',

            'descripcion' => 'required',

            'precio' => 'required|numeric',

            'stock' => 'required|integer',

            'categoria_id' => 'required',

            'marca_id' => 'required',

        ]);
        Producto::create([

            'nombre' => $request->nombre,

            'descripcion' => $request->descripcion,

            'precio' => $request->precio,

            'stock' => $request->stock,

            'imagen' => $request->imagen,

            'activo' => $request->has('activo'),

            'categoria_id' => $request->categoria_id,

            'marca_id' => $request->marca_id,

        ]);
        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $producto = Producto::findOrFail($id);

    return view(
        'productos.show',
        compact('producto')
    );
}

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $producto = Producto::findOrFail($id);

    $categorias = Categoria::all();

    $marcas = Marca::all();

    return view(
        'productos.edit',
        compact(
            'producto',
            'categorias',
            'marcas'
        )
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    string $id
)
{
    $request->validate([

        'nombre' => 'required|max:255',

        'descripcion' => 'required',

        'precio' => 'required|numeric',

        'stock' => 'required|integer',

        'categoria_id' => 'required',

        'marca_id' => 'required',

    ]);

    $producto = Producto::findOrFail($id);

    $producto->update([

        'nombre' => $request->nombre,

        'descripcion' => $request->descripcion,

        'precio' => $request->precio,

        'stock' => $request->stock,

        'imagen' => $request->imagen,

        'activo' => $request->has('activo'),

        'categoria_id' => $request->categoria_id,

        'marca_id' => $request->marca_id,

    ]);

    return redirect('/productos');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $producto = Producto::findOrFail($id);

    $producto->delete();

    return redirect('/productos');
}
}
