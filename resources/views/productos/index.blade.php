<h1>Productos</h1>

<a href="{{ route('productos.create') }}">
    Crear Producto
</a>

@foreach($productos as $producto)

    <div>

        <h2>{{ $producto->nombre }}</h2>

        <p>${{ $producto->precio }}</p>

        <a href="{{ route('productos.show', $producto->id) }}">
            Ver
        </a>

        <a href="{{ route('productos.edit', $producto->id) }}">
            Editar
        </a>

        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">

            @csrf

            @method('DELETE')

            <button type="submit">

                Eliminar

            </button>

        </form>

    </div>

    <hr>

@endforeach