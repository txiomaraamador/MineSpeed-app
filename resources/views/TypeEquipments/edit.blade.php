@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Type Equipment</h1>

        <form action="{{ route('TypeEquipments.update', $typeEquipment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="make">Make:</label>
                <input type="text" name="make" id="make" class="form-control" value="{{ $typeEquipment->make }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ $typeEquipment->description }}" required>
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" name="model" id="model" class="form-control" value="{{ $typeEquipment->model }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
