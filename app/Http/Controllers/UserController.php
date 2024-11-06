<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    

    public function getEstado()
    {
        $usuarios = User::select('name', 'email', 'estado')->get();
        return view('estado', compact('usuarios'));
    }

}
