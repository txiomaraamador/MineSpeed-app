@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Type of Vehicle</h1>

        <form action="{{ route('typevehicles.update', $typeVehicle->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $typeVehicle->name }}" required>
            </div>

            <!-- Agrega más campos del formulario según tus necesidades -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
