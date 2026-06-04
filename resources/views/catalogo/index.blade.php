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
        {{-- GET agrega filtros a la URL --}}
        <form method="GET" action="/catalogo">

            <div class="row">




                {{-- FILTRO CATEGORÍA --}}
                <div class="col-md-4 mb-3">

                    <select
                        name="categoria_id"
                        class="form-select">

                        <option value="">

                            Todas las categorías

                        </option>




                        {{-- Recorremos categorías --}}
                        @foreach($categorias as $categoria)

                        <option

                            value="{{ $categoria->id }}"

                            {{-- Mantiene seleccionada --}}
                            @selected(
                            request('categoria_id')==$categoria->id
                            )

                            >

                            {{ $categoria->nombreCategoria }}

                        </option>

                        @endforeach

                    </select>

                </div>




                {{-- FILTRO MARCA --}}
                <div class="col-md-4 mb-3">

                    <select
                        name="marca_id"
                        class="form-select">

                        <option value="">

                            Todas las marcas

                        </option>




                        {{-- Recorremos marcas --}}
                        @foreach($marcas as $marca)

                        <option

                            value="{{ $marca->id }}"

                            @selected(
                            request('marca_id')==$marca->id
                            )

                            >

                            {{ $marca->nombre }}

                        </option>

                        @endforeach

                    </select>

                </div>




                {{-- BOTÓN FILTRAR --}}
                <div class="col-md-4 mb-3">

                    <button
                        type="submit"
                        class="btn btn-dark w-100">

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

                <div
                    class="card mb-3 mt-3 h-100"
                    style="width: 18rem;">




                    {{-- IMAGEN --}}
                    <img

                        src="{{ asset($producto->imagen) }}"

                        class="card-img-top producto"

                        alt="{{ $producto->nombre }}">




                    <div class="card-body d-flex flex-column">




                        {{-- PRECIO --}}
                        <h5
                            class="card-title fw-bold text-black">

                            ${{ $producto->precio }}

                        </h5>




                        <div class="mt-auto">




                            {{-- NOMBRE --}}
                            <p
                                class="card-text text-black mb-2">

                                {{ $producto->nombre }}

                            </p>




                            {{-- BOTÓN  seleccion cantidad y agregar al carrito --}}
                            <form
                                action="{{ route('carrito.agregar') }}"
                                method="POST">

                                @csrf

                                <input
                                    type="hidden"
                                    name="producto_id"
                                    value="{{ $producto->id }}">
                                
                                <div class="mb-2 ms-auto me-auto" style="max-width: 60px;">

                                    <input
                                        type="number"
                                        name="cantidad"
                                        class="form-control"
                                        value="1"
                                        min="1">

                                </div>

                                <button
                                    type="submit"
                                    class="btn btn-warning w-100">

                                    Agregar al carrito

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</main>

@endsection




