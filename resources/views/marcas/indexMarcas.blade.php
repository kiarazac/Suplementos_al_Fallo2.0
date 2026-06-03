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
                Lista de Todas las Marcas
            </h1>
            
            {{-- SECCIÓN SUPERIOR: Filtros y Botón Crear --}}
            <div class="mb-4">
                <form method="GET" action="{{ route('panel_admin.index') }}">
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

            {{-- LISTADO DE MARCAS --}}
            @foreach($marcas as $marca)
            <div class="card mb-3 {{ $marca->activo == 0 ? 'bg-light border-secondary opacity-75' : 'border-dark' }}">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <span class="fw-bold">
                        {{ $marca->nombre }}
                        @if($marca->activo == 0)
                        <span class="badge bg-secondary ms-2">Inactiva</span>
                        @endif
                    </span>

                    <div>
                        {{-- BOTÓN EDITAR --}}
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $marca->id }}">
                            Editar
                        </button>

                        {{-- FORMULARIO DE ACTIVAR/DESACTIVAR --}}
                        @if($marca->activo == 1)
                        <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                        </form>
                        @else
                        <form action="{{ route('marcas.activate', $marca->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Activar</button>
                        </form>
                        @endif
                    </div>

                </div>
            </div>
            
            {{-- EL MODAL DE EDICIÓN (Queda igual) --}}
            <div class="modal fade" id="editModal{{ $marca->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $marca->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('marcas.update', $marca->id) }}" method="POST">
                            @csrf
                            @method('PUT') 
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $marca->id }}">Editar Marca</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre de la Marca</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $marca->nombre }}" required>
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

@endsection