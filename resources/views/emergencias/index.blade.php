@extends('layouts.sidebar')

@section('styles')
<style>
        /* Estilo general para el formulario */
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
        }

        /* Estilo del encabezado */
        h1 {
            font-family: 'Arial', sans-serif;
            font-size: 2.5rem;
            font-weight: 600;
            color: #007bff;
            text-align: center;
            margin-bottom: 1px;
        }

        /* Estilo para el botón */
        button[type="submit"] {
            background-color: #007bff;
            border: none;
            font-size: 1.1rem;
            padding: 12px 20px;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Estilo para los campos de formulario */
        input, select, textarea {
            background-color: #ffffff;  /* Fondo blanco */
            border: 1px solid #ddd;  /* Borde agregado */
            border-radius: 5px;
            padding: 12px 18px;
            font-size: 1rem;
            width: 100%;
            margin-bottom: 15px;
        }

        /* Estilo de la alerta */
        .alert {
            margin-top: 20px;
            font-size: 1.1rem;
        }

        /* Estilos para el contenedor */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Media query para pantallas pequeñas */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            form {
                padding: 20px;
                max-width: 100%;
            }

            button[type="submit"] {
                font-size: 1rem;
            }

            input, select, textarea {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }
    </style>

@endsection

@section('content')
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
@endsection
