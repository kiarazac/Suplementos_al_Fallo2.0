<h1>Editar Producto</h1>

<form action="{{ route('panel_admin.update', $producto->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}">
    </div>

    <div>
        <label>Descripción</label>
        <textarea name="descripcion">{{ $producto->descripcion }}</textarea>
    </div>

    <div>
        <label>Precio</label>
        <input type="number" min="0" step="0.01" name="precio" value="{{ $producto->precio }}">
    </div>

    <div>
        <label>Stock</label>
        <input type="number" min="0" name="stock" value="{{ $producto->stock }}">
    </div>

    <div>
        <label>Imagen</label>
        <input type="text" name="imagen" value="{{ $producto->imagen }}">
    </div>

    <div>
        <label>Categoría</label>
        <select name="categoria_id">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" @selected($producto->categoria_id == $categoria->id)>
                    {{ $categoria->nombreCategoria }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Marca</label>
        <select name="marca_id">
            @foreach($marcas as $marca)
                <option value="{{ $marca->id }}" @selected($producto->marca_id == $marca->id)>
                    {{ $marca->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Activo</label>
        <input type="checkbox" name="activo" value="1" @checked($producto->activo)>
    </div>

    <button type="submit">Actualizar</button>

</form>