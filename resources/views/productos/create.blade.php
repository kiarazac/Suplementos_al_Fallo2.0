<h1>Crear Producto</h1>

<form action="{{ route('productos.store') }}" method="POST">

    @csrf

    <div>
        <label>Nombre</label>

        <input type="text" name="nombre">
    </div>

    <div>
        <label>Descripción</label>

        <textarea name="descripcion"></textarea>
    </div>

    <div>
        <label>Precio</label>

        <input type="number" min="0" step="0.01" name="precio">
    </div>

    <div>
        <label>Stock</label>

        <input type="number" min="0" name="stock">
    </div>

    <div>
        <label>Imagen</label>

        <input type="text" name="imagen">
    </div>

    <div>
        <label>Categoría</label>

        <select name="categoria_id">

            @foreach($categorias as $categoria)

                <option value="{{ $categoria->id }}">

                    {{ $categoria->nombreCategoria }}

                </option>

            @endforeach

        </select>
    </div>

    <div>
        <label>Marca</label>

        <select name="marca_id">

            @foreach($marcas as $marca)

                <option value="{{ $marca->id }}">

                    {{ $marca->nombre }}

                </option>

            @endforeach

        </select>
    </div>

    <div>
        <label>Activo</label>

        <input type="checkbox" name="activo" value="1">
    </div>

    <button type="submit">

        Guardar Producto

    </button>

</form>