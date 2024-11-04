<?php

namespace App\Http\Controllers;

use App\Models\Emergencia;

use Illuminate\Http\Request;


class EmergenciaController extends Controller
{
    
    public function index()
    {
        return view('emergencias.index');
    }

   
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'apellido_cliente' => 'required|string|max:255',
            'rut_cliente' => 'required|string|unique:emergencias',
            'sexo' => 'required',
            'descripcion_emergencia' => 'required|string',
            'numero_victimas' => 'required|integer|min:1',
            'direccion' => 'nullable|string',
        ]);

        
        Emergencia::create($validatedData);

        return redirect()->route('emergencias.index')->with('success', 'Registro de emergencia creado correctamente');
    }
}

