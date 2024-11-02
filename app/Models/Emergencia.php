<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_cliente',
        'apellido_cliente',
        'rut_cliente',
        'sexo',
        'descripcion_emergencia',
        'numero_victimas',
        'direccion',
    ];
}
