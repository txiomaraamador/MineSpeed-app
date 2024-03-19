@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Tipo de Vehículo</h1>

        <form action="{{ route('typevehicles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            {{-- Agrega más campos del formulario según tus necesidades --}}

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
@endsection
