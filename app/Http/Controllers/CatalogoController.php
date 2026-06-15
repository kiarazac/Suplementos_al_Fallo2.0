<?php

namespace App\Http\Controllers;

// Importamos modelos
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;

// Importamos Request
use Illuminate\Http\Request;

class CatalogoController extends Controller
{

    // Método principal del catálogo
    public function index(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | Creamos una consulta base
        |--------------------------------------------------------------------------
        |
        | Esto TODAVÍA NO ejecuta SQL.
        | Solo prepara la consulta.
        |
        */

        $query = Producto::query();


        /*
        |--------------------------------------------------------------------------
        | FILTRO POR CATEGORÍA
        |--------------------------------------------------------------------------
        |
        | Si existe categoria_id en la URL:
        | /catalogo?categoria_id=1
        |
        | filtramos productos.
        |
        */

        if ($request->categoria_id) {
            $query->where(
                'categoria_id',
                $request->categoria_id
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTRO POR MARCA
        |--------------------------------------------------------------------------
        |
        | Si existe marca_id:
        | /catalogo?marca_id=2
        |
        */

        if ($request->marca_id) {
            $query->where(
                'marca_id',
                $request->marca_id
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTRO POR NOMBRE (BUSCADOR)
        |--------------------------------------------------------------------------
        |
        | Si el usuario escribió algo en la barra de búsqueda:
        | /catalogo?buscar=creatina
        |
        */

        if ($request->buscar) {
            // Usamos LIKE para buscar coincidencias parciales.
            // Los '%' significan "cualquier texto antes o después"
            $query->where('nombre', 'LIKE', '%' . $request->buscar . '%');
        }


        /*
        |--------------------------------------------------------------------------
        | SOLO PRODUCTOS ACTIVOS
        |--------------------------------------------------------------------------
        */

        $query->where('activo', true);


        /*
        |--------------------------------------------------------------------------
        | EJECUTAMOS CONSULTA
        |--------------------------------------------------------------------------
        |
        | Recién acá se hace el SELECT SQL real.
        |
        */

        $productos = $query->get();


        /*
        |--------------------------------------------------------------------------
        | Traemos categorías y marcas
        |--------------------------------------------------------------------------
        |
        | Para llenar los filtros <select>
        |
        */

        $categorias = Categoria::all();

        $marcas = Marca::all();


        /*
        |--------------------------------------------------------------------------
        | Retornamos vista
        |--------------------------------------------------------------------------
        */

        return view(
            'catalogo.index',
            compact(
                'productos',
                'categorias',
                'marcas'
            )
        );
        
    }
}