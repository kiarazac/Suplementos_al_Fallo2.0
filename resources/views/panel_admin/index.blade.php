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
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white w-100 text-start" data-bs-toggle="pill" data-bs-target="#pantalla-categorias" type="button" role="tab">Categorías</button>
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
                <div class="tab-pane fade" id="pantalla-categorias" role="tabpanel">
                    <h1 class="welcome-container text-center fs-0">
                        Lista de Todas las Marcas
                    </h1>

                    {{-- SECCIÓN SUPERIOR: Filtros y Botón Crear --}}
                    <div class="mb-4">
                        <form method="GET" action="{{ route('marcas.index') }}">
                            <div class="row align-items-end">
                                {{-- FILTRO CATEGORÍA --}}
                                <div class="col-md-5 mb-3">
                                    <select name="activo" class="form-select">
                                        <option value="" {{ request('activo') === null ? 'selected' : '' }}>Todas las marcas</option>
                                        <option value="1" {{ request('activo') === '1' ? 'selected' : '' }}>Activas</option>
                                        <option value="0" {{ request('activo') === '0' ? 'selected' : '' }}>Inactivas</option>
                                    </select>
                                </div>

                                {{-- BOTÓN FILTRAR --}}
                                <div class="col-md-3 mb-3">
                                    <button type="submit" class="btn btn-dark w-100">
                                        Filtrar
                                    </button>
                                </div>

                                {{-- BOTÓN CREAR NUEVA MARCA (Modificado para abrir Modal) --}}
                                <div class="col-md-4 mb-3">
                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#createModal">
                                        Crear Nueva Marca
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>

    </div>
    {{-- ========================================== --}}
{{-- MODAL PARA CREAR NUEVA MARCA               --}}
{{-- Lo colocamos fuera del foreach para que    --}}
{{-- solo se genere una vez en el HTML.         --}}
{{-- ========================================== --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            {{-- Apuntamos al método 'store' usando POST para guardar en BD --}}
            <form action="{{ route('marcas.store') }}" method="POST">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Crear Nueva Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                
                <div class="modal-body">
                    {{-- Campo Nombre --}}
                    <div class="mb-3">
                        <label for="nombre_create" class="form-label">Nombre de la Marca</label>
                        <input type="text" class="form-control" id="nombre_create" name="nombre" placeholder="Ej: Nike, Adidas..." required>
                    </div>
                    
                    {{-- Campo Estado (Activo/Inactivo) --}}
                    <div class="mb-3">
                        <label for="activo_create" class="form-label">Estado Inicial</label>
                        <select class="form-select" id="activo_create" name="activo" required>
                            <option value="1" selected>Activa (Visible)</option>
                            <option value="0">Inactiva (Oculta)</option>
                        </select>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear Marca</button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>
@endsection

@section('scripts')
{{--<script src="{{ asset('js/sidebars.js') }}"></script>--}}
@endsection