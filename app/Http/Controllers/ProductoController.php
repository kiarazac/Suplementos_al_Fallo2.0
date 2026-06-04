<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Pedido;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productos = Producto::all();
        
        // --- FILTRO DE CATEGORÍAS ---
        $queryCategorias = Categoria::query();
        if ($request->filled('categoria_activa')) {
            $queryCategorias->where('activa', $request->categoria_activa);
        }
        $categorias = $queryCategorias->get();

        // --- FILTRO DE MARCAS ---
        $queryMarcas = Marca::query();
        if ($request->filled('activo')) {
            $queryMarcas->where('activo', $request->activo);
        }
        $marcas = $queryMarcas->get();

        // --- PEDIDOS --- (Ordenados de más nuevo a más viejo)
        $pedidos = Pedido::orderBy('created_at', 'desc')->get();

        return view('panel_admin.index', compact('productos', 'marcas', 'categorias', 'pedidos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        $marcas = Marca::all();

        return view(
            'panel_admin.create',
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
        return redirect('/panel_admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);

        return view(
            'panel_admin.show',
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
            'panel_admin.edit',
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
    ) {
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

        return redirect('/panel_admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->delete();

        return redirect('/panel_admin');
    }
}
