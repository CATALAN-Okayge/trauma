<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Hospital Trauma') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <script src="{{ asset('js/sidebar.js') }}" defer></script>
    @yield('styles')
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('imagenes/Logo_trauma.png') }}" alt="Logo Hospital">
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('emergencias.index') }}" class="sidebar-link">Registro de Emergencia</a>
            <a href="{{ route('estado') }}" class="sidebar-link">estado</a>
        </div>

        <div class="user-status">
            <p>{{ Auth::user()->name }}</p>
            <select id="status-selector" onchange="updateStatus()">
                <option value="disponible" {{ Auth::user()->estado == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="ocupado" {{ Auth::user()->estado == 'ocupado' ? 'selected' : '' }}>Ocupado</option>
                <option value="no disponible" {{ Auth::user()->estado == 'no disponible' ? 'selected' : '' }}>No disponible</option>
            </select>
        </div>
    </div>

    <div class="content">
        @yield('content') <!-- Aquí se mostrará el contenido de las diferentes vistas -->
    </div>

    <script>
        function updateStatus() {
            const status = document.getElementById('status-selector').value;
            fetch('/update-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ estado: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Estado actualizado correctamente');
                }
            })
            .catch(error => console.error('Error al actualizar el estado:', error));
        }
    </script>
</body>
</html>
