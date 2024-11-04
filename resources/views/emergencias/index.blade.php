<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Emergencia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body>

<div class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('imagenes/Logo_Hospital_de_Melipilla.png') }}" alt="Logo Hospital">
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('emergencias.index') }}" class="sidebar-link">Registro de Emergencia</a>
            <!-- Puedes agregar más botones aquí cuando tengas nuevas vistas -->
        </div>
</div>


<div class="container mt-5">
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
