<nav class="encabezado navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="/">
            <img src="{{ asset('imagenes/logos/logo_mascaracFondo.png') }}" alt="Logo de la página" height="100">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-dark bg-dark" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active text-warning' : '' }}" href="/">
                        Principal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sobre-nosotros') ? 'active text-warning' : '' }}" href="/sobre-nosotros">
                        Sobre nosotros
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contacto') ? 'active text-warning' : '' }}" href="/contacto">
                        Contacto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('Comercializacion') ? 'active text-warning' : '' }}" href="/Comercializacion">
                        Comercializacion
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('terminos-y-condiciones') ? 'active text-warning' : '' }}" href="/terminos-y-condiciones">
                        Términos y Condiciones
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('catalogo') ? 'active text-warning' : '' }}" href="/catalogo">
                        Catálogo
                    </a>
                </li>
            </ul>



            @php
            // 1. Creamos la variable temporal en PHP, arranca en 0
            $cantidadCarrito = 0;

            if(Auth::check()) {
            // 2. Buscamos el carrito usando 'cliente_id' (como está en tu BD)
            $carrito = \App\Models\Carrito::where('cliente_id', Auth::id())
            ->first();

            // 3. Si el carrito existe, sumamos las cantidades del detalle
            if ($carrito) {
            // Asegúrate de que tu modelo se llame 'DetalleCarrito'
            $cantidadCarrito = \App\Models\Detalle_Carrito::where('carrito_id', $carrito->id)
            ->sum('cantidad');
            }
            }
            @endphp

            {{-- Condición para ocultar el carrito a los administradores --}}
            @if(!Auth::check() || Auth::user()->role != 'admin')
                
                @php
                // 1. Creamos la variable temporal en PHP, arranca en 0
                $cantidadCarrito = 0;

                if(Auth::check()) {
                    // 2. Buscamos el carrito usando 'cliente_id' (como está en tu BD)
                    $carrito = \App\Models\Carrito::where('cliente_id', Auth::id())->first();

                    // 3. Si el carrito existe, sumamos las cantidades del detalle
                    if ($carrito) {
                        // Asegúrate de que tu modelo se llame 'Detalle_Carrito'
                        $cantidadCarrito = \App\Models\Detalle_Carrito::where('carrito_id', $carrito->id)->sum('cantidad');
                    }
                }
                @endphp

                <a href="/carrito" class="btn btn-outline-warning ms-auto me-3 d-flex align-items-center gap-2 position-relative">
                    <i class="bi bi-cart"></i>

                    @if($cantidadCarrito > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $cantidadCarrito }}
                        <span class="visually-hidden">productos en el carrito</span>
                    </span>
                    @endif
                </a>

            @endif


            @guest
            <a class="btn btn-outline-warning ms-2" href="/registro">Registro</a>
            <a class="btn btn-outline-warning ms-2 d-flex align-items-center gap-2" href="/login">
                <i class="bi bi-person"></i>
                <span>Login</span>
            </a>
            @endguest

            @auth
            @if(Auth::user()->role == 'admin')
            <a class="btn btn-outline-danger ms-2 d-flex align-items-center gap-2" href="/panel_admin">
                <i class="bi bi-person-fill"></i>
                <span>{{ Auth::user()->name }}</span>
            </a>
            <form action="/logout" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger ms-2 d-flex align-items-center gap-2" title="Cerrar sesión">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>

            @else
            <div class="dropdown ms-2">
                <button class="btn btn-outline-warning dropdown-toggle d-flex align-items-center gap-2" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill"></i>
                    <span>{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="userMenu">
                    <li>
                        <button class="dropdown-item">
                            <i class="bi bi-clipboard"></i>
                            <a class="text-decoration-none text-dark" href="/listado_pedidos/{{ Auth::id() }}">Mis Pedidos</a>
                        </button>
                    </li>



                    <li>
                        <form action="/logout" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2">
                                <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            @endif
            @endauth

        </div>
    </div>
</nav>