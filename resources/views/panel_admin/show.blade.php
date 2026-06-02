<h1>{{ $producto->nombre }}</h1>

<p>{{ $producto->descripcion }}</p>

<p>Precio: ${{ $producto->precio }}</p>

<p>Stock: {{ $producto->stock }}</p>

<img src="{{ $producto->imagen }}" width="200">