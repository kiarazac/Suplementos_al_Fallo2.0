<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    

    @yield('page-css')
</head>

<body class="bg-dark text-light d-flex flex-column min-vh-100 @yield('body-class')">

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Contenido dinámico -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Scripts -->
    @yield('scripts')
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}">
</script>

</body>

</html>