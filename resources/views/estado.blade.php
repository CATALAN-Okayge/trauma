@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <h1 class="text-center">Estado Disponibilidad</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
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
@endsection
