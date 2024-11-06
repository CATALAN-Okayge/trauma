<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trauma')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <!-- Barra de navegación o encabezado -->
        @include('partials.navbar')

        <!-- Contenido de la página -->
        <main class="container">
            @yield('content')
        </main>
    </div>
</body>
</html>
