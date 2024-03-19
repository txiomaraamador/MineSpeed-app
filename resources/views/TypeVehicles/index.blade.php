
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de vehiculos</h1>

        <a href="{{ route('typevehicles.create') }}" class="btn btn-primary mb-3">Agregar tipo de vehiculo</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Se creo</th>
                    <th>Ultima actualizacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typeVehicles as $typevehicles)
                    <tr>
                        <td>{{ $typevehicles->name }}</td>
                        <td>{{ $typevehicles->created_at}}</td>
                        <td>{{ $typevehicles->updated_at}}</td>
                        <td>
                            <a href="{{ route('typevehicles.show', $typevehicles->id) }}" class="btn btn-info btn-action">ver</a>
                            <a href="{{ route('typevehicles.edit', $typevehicles->id) }}" class="btn btn-primary btn-action">Editar</a>
                            <form action="{{ route('typevehicles.destroy', $typevehicles->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
