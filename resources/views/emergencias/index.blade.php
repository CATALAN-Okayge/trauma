<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Emergencia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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


<div class="container mt-5">
    @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
    <h1 class="text-center mb-4">Registro de Emergencia</h1>
    <form action="{{ route('emergencias.store') }}" method="POST" class="p-4 border rounded bg-light shadow-sm">
        @csrf
        <div class="mb-3">
            <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="apellido_cliente" class="form-label">Apellido del Cliente</label>
            <input type="text" name="apellido_cliente" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rut_cliente" class="form-label">RUT del Cliente</label>
            <input type="text" name="rut_cliente" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select name="sexo" class="form-select">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="descripcion_emergencia" class="form-label">Descripción de la Emergencia</label>
            <textarea name="descripcion_emergencia" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="numero_victimas" class="form-label">Número de Víctimas</label>
            <input type="number" name="numero_victimas" class="form-control" required min="1">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary w-100">Registrar Emergencia</button>
    </form>
</div>

</body>
</html>
