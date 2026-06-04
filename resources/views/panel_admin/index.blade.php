@extends('layouts.app')

@section('title', 'Panel Admin - Suplementos al fallo')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/sidebars.css') }}">
@endsection

@section('content')

<main>
    <div class="d-flex align-items-start">

        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark border-end border-secondary"
            style="width: 280px; min-height: calc(100vh - 60px);">
            <ul class="nav nav-pills flex-column mb-auto" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white w-100 text-start" data-bs-toggle="pill"
                        data-bs-target="#pantalla-pedidos" type="button" role="tab">Pedidos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white w-100 text-start" data-bs-toggle="pill"
                        data-bs-target="#pantalla-dashboard" type="button" role="tab">Administradores</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active w-100 text-start" data-bs-toggle="pill"
                        data-bs-target="#pantalla-productos" type="button" role="tab">Productos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white w-100 text-start" data-bs-toggle="pill"
                        data-bs-target="#pantalla-marcas" type="button" role="tab">Marcas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white w-100 text-start" data-bs-toggle="pill"
                        data-bs-target="#pantalla-categorias" type="button" role="tab">Categorías</button>
                </li>
            </ul>
        </div>
        <div class="tab-content flex-grow-1 p-4 overflow-auto" id="v-pills-tabContent" style="max-height: calc(100vh - 60px);">
            <div class="tab-pane fade" id="pantalla-pedidos" role="tabpanel">
                <h1 class="text-white">Gestión de Pedidos</h1>
                <p class="text-white-50">Aquí puedes gestionar los pedidos realizados por los clientes.</p>
                {{-- GRILLA DE PEDIDOS DINÁMICA --}}
                <div class="row g-4 w-100"> {{-- Le sumamos w-100 acá --}}
                    @foreach($pedidos as $pedido)

                    <div class="col-12 col-md-6 col-lg-4">
                        {{-- Le forzamos un ancho mínimo a la tarjeta con style --}}
                        <div class="card h-100 bg-dark text-white border-secondary shadow-sm p-3" style="min-width: 280px;">
                            <div class="card-body d-flex flex-column text-center">

                                <h4 class="card-title fw-bold mb-3">Pedido #{{ $pedido->id }}</h4>
<p class="card-text mb-2 text-light fs-6">
                                    <i class="bi bi-person-circle fs-3"></i> Cliente:{{ $pedido->titular_compra}}
                                </p>
                                <p class="card-text mb-2 text-light fs-6">
                                    <i class="bi bi-calendar-event"></i> {{ $pedido->created_at->format('d/m/Y H:i') }}
                                </p>

                                <p class="card-text mb-3 text-warning fs-4 fw-bold">
                                    Total: ${{ number_format($pedido->total, 2) }}
                                </p>

                                <p class="card-text fs-6 mb-4">
                                    @if($pedido->estado == 'confirmado')
                                    <span class="badge bg-success px-3 py-2 fs-6">Confirmado</span>
                                    @elseif($pedido->estado == 'carrito')
                                    <span class="badge bg-warning text-dark px-3 py-2 fs-6">En Carrito (Sin pagar)</span>
                                    @else
                                    <span class="badge bg-secondary px-3 py-2 fs-6">{{ ucfirst($pedido->estado) }}</span>
                                    @endif
                                    <span class="badge bg-light text-dark px-3 mt-2 py-2 fs-6">Entrega: {{ ucfirst($pedido->lugar_de_entrega) }}</span>
                                </p>

                                <div class="mt-auto d-flex flex-column gap-2">


                                    @if($pedido->estado != 'carrito')
                                    <form action="{{ route('pedidos.entregar', $pedido->id) }}" method="POST" class="w-100">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary w-100 fw-bold">Despachar</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

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
                                    <a href="{{ route('panel_admin.show', $producto->id) }}"
                                        class="btn btn-sm btn-info text-white w-100">Ver</a>
                                    <a href="{{ route('panel_admin.edit', $producto->id) }}"
                                        class="btn btn-sm btn-warning w-100">Editar</a>
                                    <form action="{{ route('panel_admin.destroy', $producto->id) }}" method="POST"
                                        class="w-100">
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
            <div class="tab-pane fade" id="pantalla-marcas" role="tabpanel">
                <h1 class="welcome-container text-center fs-0">
                    Lista de Todas las Marcas
                </h1>

                {{-- SECCIÓN SUPERIOR: Filtros y Botón Crear --}}
                <div class="mb-4">
                    <form method="GET" action="{{ route('panel_admin.index') }}">
                        <div class="row align-items-end">
                            {{-- FILTRO CATEGORÍA --}}
                            <div class="col-md-5 mb-3">
                                <select name="activo" class="form-select">
                                    <option value="" {{ request('activo') === null ? 'selected' : '' }}>Todas las marcas
                                    </option>
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
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#createModal">
                                    Crear Nueva Marca
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- GRILLA DE MARCAS DINÁMICA --}}
                <div class="row g-4">

                    @foreach($marcas as $marca)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 bg-dark text-white border-secondary shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $marca->nombre }}</h5>

                                {{-- Verificamos el estado para cambiar el texto y color --}}
                                @if($marca->activo)
                                <p class="card-text text-success fs-6">Estado: Activa</p>
                                @else
                                <p class="card-text text-danger fs-6">Estado: Inactiva</p>
                                @endif

                                <div class="mt-auto d-flex gap-2">
                                    {{-- El botón de editar siempre lleva a la ruta edit --}}
                                    <button type="button" class="btn btn-sm btn-warning w-100" data-bs-toggle="modal" data-bs-target="#editMarcaModal{{ $marca->id }}">Editar</button>

                                    @if($marca->activo)
                                    {{-- Si está activa (1), mostramos el botón rojo que ejecuta el destroy (pasar a 0)
                                                --}}
                                    <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST"
                                        class="w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger w-100">Eliminar</button>
                                    </form>
                                    @else
                                    {{-- Si está inactiva (0), mostramos un botón verde que ejecuta el activate (pasar a
                                                1) --}}
                                    <form action="{{ route('marcas.activate', $marca->id) }}" method="POST"
                                        class="w-100">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-success w-100">Activar</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- MODAL DE EDICIÓN DE MARCA --}}
                <div class="modal fade" id="editMarcaModal{{ $marca->id }}" tabindex="-1" aria-labelledby="editMarcaModalLabel{{ $marca->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('marcas.update', $marca->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMarcaModalLabel{{ $marca->id }}">Editar Marca</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nombre_marca_{{ $marca->id }}" class="form-label">Nombre de la Marca</label>
                                        <input type="text" class="form-control" id="nombre_marca_{{ $marca->id }}" name="nombre" value="{{ $marca->nombre }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="activo_marca_{{ $marca->id }}" class="form-label">Estado</label>
                                        <select class="form-select" id="activo_marca_{{ $marca->id }}" name="activo" required>
                                            <option value="1" {{ $marca->activo ? 'selected' : '' }}>Activa</option>
                                            <option value="0" {{ !$marca->activo ? 'selected' : '' }}>Inactiva</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>                    @endforeach

                </div>
                {{-- FIN DE GRILLA DE MARCAS --}}
            </div>
            {{-- ========================================== --}}
            {{-- PANTALLA DE CATEGORÍAS --}}
            {{-- ========================================== --}}
            <div class="tab-pane fade" id="pantalla-categorias" role="tabpanel">
                <h1 class="welcome-container text-center fs-0">
                    Lista de Todas las Categorías
                </h1>

                {{-- SECCIÓN SUPERIOR: Filtros y Botón Crear --}}
                <div class="mb-4">
                    <form method="GET" action="{{ route('panel_admin.index') }}">
                        <div class="row align-items-end">
                            {{-- FILTRO CATEGORÍA --}}
                            <div class="col-md-5 mb-3">
                                {{-- ATENCIÓN: Usamos 'categoria_activa' --}}
                                <select name="categoria_activa" class="form-select">
                                    <option value="" {{ request('categoria_activa') === null ? 'selected' : '' }}>Todas
                                        las categorías</option>
                                    <option value="1" {{ request('categoria_activa') === '1' ? 'selected' : '' }}>Activas
                                    </option>
                                    <option value="0" {{ request('categoria_activa') === '0' ? 'selected' : '' }}>
                                        Inactivas</option>
                                </select>
                            </div>

                            {{-- BOTÓN FILTRAR --}}
                            <div class="col-md-3 mb-3">
                                <button type="submit" class="btn btn-dark w-100">
                                    Filtrar
                                </button>
                            </div>

                            {{-- BOTÓN CREAR NUEVA CATEGORÍA --}}
                            <div class="col-md-4 mb-3">
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#createCategoriaModal">
                                    Crear Nueva Categoría
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- GRILLA DE CATEGORÍAS DINÁMICA --}}
                <div class="row g-4">
                    @foreach($categorias as $categoria)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 bg-dark text-white border-secondary shadow-sm">
                            <div class="card-body d-flex flex-column">

                                {{-- CORRECCIÓN 1: nombreCategoria --}}
                                <h5 class="card-title fw-bold">{{ $categoria->nombreCategoria }}</h5>

                                {{-- CORRECCIÓN 2: activa --}}
                                @if($categoria->activa)
                                <p class="card-text text-success fs-6">Estado: Activa</p>
                                @else
                                <p class="card-text text-danger fs-6">Estado: Inactiva</p>
                                @endif

                                <div class="mt-auto d-flex gap-2">
                                    <button type="button" class="btn btn-sm btn-warning w-100" data-bs-toggle="modal" data-bs-target="#editCategoriaModal{{ $categoria->id }}">Editar</button>

                                    {{-- CORRECCIÓN 3: activa --}}
                                    @if($categoria->activa)
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                        class="w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger w-100">Eliminar</button>
                                    </form>
                                    @else
                                    <form action="{{ route('categorias.activate', $categoria->id) }}" method="POST"
                                        class="w-100">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-success w-100">Activar</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL DE EDICIÓN DE CATEGORÍA --}}
                    <div class="modal fade" id="editCategoriaModal{{ $categoria->id }}" tabindex="-1" aria-labelledby="editCategoriaModalLabel{{ $categoria->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCategoriaModalLabel{{ $categoria->id }}">Editar Categoría</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nombre_categoria_{{ $categoria->id }}" class="form-label">Nombre de la Categoría</label>
                                            <input type="text" class="form-control" id="nombre_categoria_{{ $categoria->id }}" name="nombreCategoria" value="{{ $categoria->nombreCategoria }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="activa_categoria_{{ $categoria->id }}" class="form-label">Estado</label>
                                            <select class="form-select" id="activa_categoria_{{ $categoria->id }}" name="activa" required>
                                                <option value="1" {{ $categoria->activa ? 'selected' : '' }}>Activa</option>
                                                <option value="0" {{ !$categoria->activa ? 'selected' : '' }}>Inactiva</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- FIN DE GRILLA DE CATEGORÍAS --}}
            </div>




        </div>



    </div>

    </div>
    {{-- ========================================== --}}
    {{-- MODAL PARA CREAR NUEVA MARCA --}}
    {{-- Lo colocamos fuera del foreach para que --}}
    {{-- solo se genere una vez en el HTML. --}}
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
                            <input type="text" class="form-control" id="nombre_create" name="nombre"
                                placeholder="Ej: Nike, Adidas..." required>
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
    {{-- ========================================== --}}
    {{-- MODAL PARA CREAR NUEVA CATEGORÍA --}}
    {{-- ========================================== --}}
    <div class="modal fade" id="createCategoriaModal" tabindex="-1" aria-labelledby="createCategoriaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                {{-- Apuntamos al método 'store' del controlador de Categorías --}}
                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoriaModalLabel">Crear Nueva Categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                        {{-- Campo Nombre (Ajustado a nombreCategoria) --}}
                        <div class="mb-3">
                            <label for="nombre_categoria_create" class="form-label">Nombre de la Categoría</label>
                            <input type="text" class="form-control" id="nombre_categoria_create" name="nombreCategoria"
                                placeholder="Ej: Proteínas, Creatinas..." required>
                        </div>

                        {{-- Campo Estado (Ajustado a activa) --}}
                        <div class="mb-3">
                            <label for="activa_categoria_create" class="form-label">Estado Inicial</label>
                            <select class="form-select" id="activa_categoria_create" name="activa" required>
                                <option value="1" selected>Activa (Visible)</option>
                                <option value="0">Inactiva (Oculta)</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear Categoría</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Obtenemos todos los botones del sidebar que cambian pestañas
        let tabButtons = document.querySelectorAll('button[data-bs-toggle="pill"]');

        // 2. Le decimos a cada botón: "Si te hacen clic, guardá tu ID en la memoria"
        tabButtons.forEach(button => {
            button.addEventListener('shown.bs.tab', function(event) {
                sessionStorage.setItem('pestañaActiva', event.target.getAttribute('data-bs-target'));
            });
        });

        // 3. Cuando la página termina de recargar (por ejemplo, después de filtrar)
        let pestañaGuardada = sessionStorage.getItem('pestañaActiva');

        // Si hay una pestaña guardada en la memoria...
        if (pestañaGuardada) {
            // Buscamos ese botón en el sidebar
            let botonAActivar = document.querySelector('button[data-bs-target="' + pestañaGuardada + '"]');

            // Si el botón existe, usamos el motor de Bootstrap para hacerle clic "invisible"
            if (botonAActivar) {
                let tab = new bootstrap.Tab(botonAActivar);
                tab.show();
            }
        }
    });
</script>
@endsection