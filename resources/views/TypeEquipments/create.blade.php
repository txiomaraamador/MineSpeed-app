@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Type Equipment</h1>

        <form action="{{ route('TypeEquipments.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="make">Make:</label>
                <input type="text" name="make" id="make" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" name="model" id="model" class="form-control" required>
            </div>

            {{-- Agrega más campos del formulario según tus necesidades --}}

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
