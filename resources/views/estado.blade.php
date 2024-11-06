<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado Disponibilidad</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f8;
        }
        .sidebar {
            width: 250px;
            background-color: #102030;
            color: #ecf0f1;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            transition: all 0.3s;
        }
        .sidebar-logo img {
            width: 120px;
            margin-bottom: 30px;
        }
        .sidebar-menu {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar-link {
            width: 90%;
            padding: 15px;
            margin: 10px 0;
            color: #ecf0f1;
            text-decoration: none;
            font-size: 18px;
            text-align: center;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .sidebar-link:hover {
            background-color: #0e2738;
            color: #ecf0f1;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            transition: margin-left 0.3s, width 0.3s;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('imagenes/Logo_Hospital_de_Melipilla.png') }}" alt="Logo Hospital">
            </div>
            <div class="sidebar-menu">
                <a href="{{ route('emergencias.index') }}" class="sidebar-link">Registro de Emergencia</a>
                
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
    <h1 style="text-align: center;">Estado disponibilidad</h1>
    <div class="table-container">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="estado-usuarios">
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script>
        function refreshEstado() {
            fetch('/estado')
                .then(response => response.json())
                .then(data => {
                    const estadoUsuarios = document.getElementById('estado-usuarios');
                    estadoUsuarios.innerHTML = '';
                    data.usuarios.forEach(usuario => {
                        const row = `<tr>
                            <td>${usuario.name}</td>
                            <td>${usuario.email}</td>
                            <td>${usuario.estado}</td>
                        </tr>`;
                        estadoUsuarios.innerHTML += row;
                    });
                });
        }
        // Actualiza cada 5 segundos
        setInterval(refreshEstado, 5000);
    </script>
</body>
</html>
