<?php

namespace App\Http\Controllers;

use App\Models\Emergencia;

use Illuminate\Http\Request;


class EmergenciaController extends Controller
{
    // Muestra la vista de emergencias
    public function index()
    {
        return view('emergencias.index');
    }

    // Almacena un nuevo registro de emergencia
    public function store(Request $request)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'apellido_cliente' => 'required|string|max:255',
            'rut_cliente' => 'required|string|unique:emergencias',
            'sexo' => 'required',
            'descripcion_emergencia' => 'required|string',
            'numero_victimas' => 'required|integer|min:1',
            'direccion' => 'nullable|string',
        ]);

        // Creación de un nuevo registro en la tabla emergencias
        Emergencia::create($validatedData);

        return redirect()->route('emergencias.index')->with('success', 'Registro de emergencia creado correctamente');
    }
}

