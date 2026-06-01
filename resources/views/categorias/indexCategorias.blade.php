@extends('layouts.app')

@section('title', 'Catálogo - Al Fallo Store')

@section('content')

<main class="flex-grow-1 container mt-5">

    <div class="row">

        {{-- LADO IZQUIERDO: Panel de navegación --}}
        <div class="col-md-4">
            <div class="p-3 border rounded bg-light">
                <p class="mb-0">Panel de navegación administrador</p>
            </div>
        </div>

        {{-- LADO DERECHO: Filtros y listado --}}
        <div class="col-md-8">
            <h1 class="welcome-container text-center fs-0">
                Lista de Todas las categorías
            </h1>

            {{-- SECCIÓN SUPERIOR: Filtros y Botón Crear --}}
            <div class="mb-4">
                <form method="GET" action="{{ route('categorias.index') }}">
                    <div class="row align-items-end">
                        {{-- FILTRO CATEGORÍA --}}
                        <div class="col-md-5 mb-3">
                            {{-- CORRECCIÓN: name="activa" --}}
                            <select name="activa" class="form-select">
                                <option value="" {{ request('activa') === null ? 'selected' : '' }}>Todas las categorías</option>
                                <option value="1" {{ request('activa') === '1' ? 'selected' : '' }}>Activas</option>
                                <option value="0" {{ request('activa') === '0' ? 'selected' : '' }}>Inactivas</option>
                            </select>
                        </div>

                        {{-- BOTÓN FILTRAR --}}
                        <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-dark w-100">
                                Filtrar
                            </button>
                        </div>

                        {{-- BOTÓN CREAR NUEVA CATEGORIA (Modificado para abrir Modal) --}}
                        <div class="col-md-4 mb-3">
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#createModal">
                                Crear Nueva Categoría
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- LISTADO DE CATEGORIAS --}}
            @foreach($categorias as $categoria)
            <div class="card mb-3 {{ $categoria->activa == 0 ? 'bg-light border-secondary opacity-75' : 'border-dark' }}">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <span class="fw-bold">
                        {{ $categoria->nombreCategoria }}
                        @if($categoria->activa == 0)
                        <span class="badge bg-secondary ms-2">Inactiva</span>
                        @endif
                    </span>

                    <div>
                        {{-- BOTÓN EDITAR --}}
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $categoria->id }}">
                            Editar
                        </button>

                        {{-- FORMULARIO DE ACTIVAR/DESACTIVAR --}}
                        @if($categoria->activa == 1)
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                        </form>
                        @else
                        <form action="{{ route('categorias.activate', $categoria->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Activar</button>
                        </form>
                        @endif
                    </div>

                </div>
            </div>

            {{-- EL MODAL DE EDICIÓN (Queda igual) --}}
            <div class="modal fade" id="editModal{{ $categoria->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $categoria->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $categoria->id }}">Editar Categoría</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre de la Categoría</label>
                                    <input type="text" class="form-control" id="nombre" name="nombreCategoria" value="{{ $categoria->nombreCategoria }}" required>
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

        </div> {{-- Fin del lado derecho --}}

    </div> {{-- Fin de la fila principal --}}
</main>

{{-- ========================================== --}}
{{-- MODAL PARA CREAR NUEVA CATEGORÍA               --}}
{{-- Lo colocamos fuera del foreach para que    --}}
{{-- solo se genere una vez en el HTML.         --}}
{{-- ========================================== --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            {{-- Apuntamos al método 'store' usando POST para guardar en BD --}}
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Crear Nueva Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    {{-- Campo Nombre --}}
                    <div class="mb-3">
                        <label for="nombre_create" class="form-label">Nombre de la Categoría</label>
                        <input type="text" class="form-control" id="nombre_create" name="nombreCategoria" placeholder="Ej: Ropa, Calzado..." required>
                    </div>

                    {{-- Campo Estado (Activo/Inactivo) --}}
                    <div class="mb-3">
                        <label for="activa_create" class="form-label">Estado Inicial</label>

                        <select class="form-select" id="activa_create" name="activa" required>
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

@endsection