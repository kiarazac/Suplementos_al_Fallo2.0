@extends('layouts.app')

@section('title', 'Catálogo - Al Fallo Store')

@section('content')

    <main class="flex-grow-1">

        {{-- TÍTULO --}}
        <h1 class="welcome-container text-center mt-5 mb-4 fs-0">

            Catálogo

        </h1>




        {{-- FILTROS --}}
        <div class="container mb-5">
            {{-- Formulario GET --}}
            <form method="GET" action="{{ route('catalogo.index') }}">
                <div class="row">

                    {{-- NUEVO: BARRA DE BÚSQUEDA BLANCA --}}
                    <div class="col-md-3 mb-3">
                        <input type="text" name="buscar" class="form-control bg-white text-dark"
                            placeholder="Buscar producto..." {{-- Esto mantiene lo que el usuario escribió después de
                            recargar --}} value="{{ request('buscar') }}">
                    </div>

                    {{-- FILTRO CATEGORÍA --}}
                    <div class="col-md-3 mb-3">
                        <select name="categoria_id" class="form-select bg-white text-dark">
                            <option value="">Todas las categorías</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" @selected(request('categoria_id') == $categoria->id)>
                                    {{ $categoria->nombreCategoria }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- FILTRO MARCA --}}
                    <div class="col-md-3 mb-3">
                        <select name="marca_id" class="form-select bg-white text-dark">
                            <option value="">Todas las marcas</option>
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}" @selected(request('marca_id') == $marca->id)>
                                    {{ $marca->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- BOTÓN FILTRAR --}}
                    <div class="col-md-3 mb-3">
                        <button type="submit" class="btn btn-dark w-100">
                            Filtrar
                        </button>
                    </div>

                </div>
            </form>
        </div>



        {{-- CONTENEDOR PRODUCTOS --}}
        <div class="container-fluid text-center text-light mt-5">

            <div class="row mb-3 gy-md-4 gx-md-0">




                {{-- FOREACH DINÁMICO --}}
                {{-- Laravel repite automáticamente --}}
                {{-- este bloque por cada producto --}}
                @foreach($productos as $producto)

                    <div class="col-6 col-md-4 d-flex justify-content-center">

                        <div class="card mb-3 mt-3 h-100" style="width: 18rem;">




                            {{-- IMAGEN --}}
                            <img src="{{ asset('imagenes/productos/' . $producto->imagen) }}" class="card-img-top producto"
                                alt="{{ $producto->nombre }}">




                            <div class="card-body d-flex flex-column">




                                {{-- PRECIO --}}
                                <h5 class="card-title fw-bold text-black">

                                    ${{ $producto->precio }}

                                </h5>




                                <div class="mt-auto">




                                    {{-- NOMBRE --}}
                                    <p class="card-text text-black mb-2">

                                        {{ $producto->nombre }}

                                    </p>

                                    <p class="card-text text-black mb-2">

                                        {{ $producto->stock > 0 ? 'En stock: ' . $producto->stock : 'Agotado' }}

                                    </p>





                                    {{-- BOTÓN seleccion cantidad y agregar al carrito (Oculto para admins) --}}
                                    @if(!auth()->check() || auth()->user()->role !== 'admin')
                                        <form action="{{ route('carrito.agregar') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                                            <div class="mb-2 ms-auto me-auto" style="max-width: 60px;">
                                                <input type="number" name="cantidad" class="form-control" value="1" min="1">
                                            </div>

                                            <button type="submit" class="btn btn-warning w-100">
                                                Agregar al carrito
                                            </button>
                                        </form>
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </main>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Capturamos el input de búsqueda y todas las tarjetas
            const buscador = document.getElementById('buscadorProductos');
            const tarjetas = document.querySelectorAll('.tarjeta-producto');

            // 2. Escuchamos cada vez que el usuario presiona una tecla
            buscador.addEventListener('keyup', function (e) {
                // Convertimos el texto buscado a minúsculas para que la búsqueda sea exacta
                const textoBusqueda = e.target.value.toLowerCase();

                // 3. Recorremos cada tarjeta de producto
                tarjetas.forEach(function (tarjeta) {
                    // Obtenemos el nombre del producto dentro de la tarjeta
                    const titulo = tarjeta.querySelector('.titulo-producto').textContent.toLowerCase();

                    // 4. Comparamos: si el título incluye lo que escribimos, mostramos. Si no, ocultamos.
                    if (titulo.includes(textoBusqueda)) {
                        tarjeta.style.display = ''; // Restaura la visualización por defecto
                    } else {
                        tarjeta.style.display = 'none'; // Oculta toda la columna del producto
                    }
                });
            });
        });
    </script>
@endsection