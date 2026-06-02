@extends('layouts.app')

@section('title', 'Panel Admin - Suplementos al fallo')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/sidebars.css') }}">
@endsection

@section('content')

    <main>
     <div class="d-flex align-items-start">

        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark border-end border-secondary" style="width: 280px; min-height: calc(100vh - 60px);">
            <ul class="nav nav-pills flex-column mb-auto" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white w-100 text-start" data-bs-toggle="pill" data-bs-target="#pantalla-home" type="button" role="tab">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white w-100 text-start" data-bs-toggle="pill" data-bs-target="#pantalla-dashboard" type="button" role="tab">Dashboard</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active w-100 text-start" data-bs-toggle="pill" data-bs-target="#pantalla-productos" type="button" role="tab">Products</button>
                </li>
            </ul>
        </div>

        <div class="tab-content flex-grow-1 p-4" id="v-pills-tabContent">
            <div class="tab-pane fade" id="pantalla-home" role="tabpanel">
                <h1 class="text-white">Bienvenido al Inicio</h1>
                <p class="text-white-50">Acá podés poner gráficos o información general.</p>
            </div>

            <div class="tab-pane fade" id="pantalla-dashboard" role="tabpanel">
                <h1 class="text-white">Panel de Control</h1>
                <p class="text-white-50">Resumen de ventas, usuarios, etc.</p>
            </div>

            <div class="tab-pane fade show active" id="pantalla-productos" role="tabpanel">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="text-white m-0">Catálogo de Productos</h1>
                    <a href="{{ route('panel_admin.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Crear Producto
                    </a>
                </div>

                <div class="row g-4">
                    @foreach($productos as $producto)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100 bg-dark text-white border-secondary shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">{{ $producto->nombre }}</h5>
                                    <p class="card-text text-warning fs-5">${{ $producto->precio }}</p>

                                    <div class="mt-auto d-flex gap-2">
                                        <a href="{{ route('panel_admin.show', $producto->id) }}" class="btn btn-sm btn-info text-white w-100">Ver</a>
                                        <a href="{{ route('panel_admin.edit', $producto->id) }}" class="btn btn-sm btn-warning w-100">Editar</a>
                                        <form action="{{ route('panel_admin.destroy', $producto->id) }}" method="POST" class="w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger w-100">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    </main>
@endsection

@section('scripts')
    {{--<script src="{{ asset('js/sidebars.js') }}"></script>--}}
@endsection