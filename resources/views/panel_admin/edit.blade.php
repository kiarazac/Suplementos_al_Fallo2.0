@extends('layouts.app')

@section('title', 'Panel Admin - Suplementos al fallo')
@section('content')

<h1 class="text-warning fw-bold">Editar Producto</h1>

<form action="{{ route('panel_admin.update', $producto->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="row">
    <div class="col-md-6 offset-md-3 bg-dark p-4 rounded shadow-lg">
        
        <div class="mb-3">
            <label class="form-label text-warning fw-bold">Nombre</label>
            <input type="text" class="form-control bg-light text-dark border-secondary" name="nombre" value="{{ $producto->nombre }}" placeholder="Colocar nombre del producto...">
        </div>

        <div class="mb-3">
            <label class="form-label text-warning fw-bold">Descripción</label>
            <textarea class="form-control bg-light text-dark border-secondary" name="descripcion" rows="3" placeholder="Colocar descripción detallada...">{{ $producto->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label text-warning fw-bold">Precio</label>
            <input type="number" min="0" step="0.01" class="form-control bg-light text-dark border-secondary" name="precio" value="{{ $producto->precio }}" placeholder="Colocar precio...">
        </div>

        <div class="mb-3">
            <label class="form-label text-warning fw-bold">Stock</label>
            <input type="number" min="0" class="form-control bg-light text-dark border-secondary" name="stock" value="{{ $producto->stock }}" placeholder="Colocar cantidad de stock...">
        </div>

        <div class="mb-3">
    <label class="form-label text-warning fw-bold">Ubicación de la Imagen</label>
    
    <input type="text" class="form-control bg-light text-dark border-secondary" name="imagen" value="{{  $producto->imagen }}" placeholder="Ej: Creatinas/Crea-500-star.jpg">
    
    {{-- Texto de ayuda explicativo --}}
    <div class="form-text text-white-50 mt-1">
        <i class="bi bi-info-circle"></i> Si la foto está en una carpeta, escribe la carpeta y el nombre exacto del archivo (Ej: <strong>Proteinas/gold.jpg</strong>). Si está suelta, solo el nombre (Ej: <strong>foto.png</strong>).
    </div>
</div>

        <div class="mb-3">
            <label class="form-label text-warning    fw-bold">Categoría</label>
            <select class="form-select bg-light text-dark border-secondary" name="categoria_id">
                <option value="" disabled>Colocar categoría...</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @selected($producto->categoria_id == $categoria->id)>
                        {{ $categoria->nombreCategoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label text-warning fw-bold">Marca</label>
            <select class="form-select bg-light text-dark border-secondary" name="marca_id">
                <option value="" disabled>Colocar marca...</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" @selected($producto->marca_id == $marca->id)>
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4 form-check mt-3">
            <input type="checkbox" class="form-check-input bg-dark border-secondary" name="activo" value="1" id="checkActivo" @checked($producto->activo)>
            <label class="form-check-label text-white" for="checkActivo">Activo (Visible en el catálogo)</label>
        </div>

        <div class="d-grid gap-3">
            <button type="submit" class="btn btn-warning fw-bold fs-5 btn-hover-shadow">Actualizar Producto</button>
            <a href="{{ route('panel_admin.index') }}" class="btn btn-outline-light btn-hover-shadow-light">Cancelar</a>
        </div>

    </div>
</div>
</form>


@endsection