<!-- resources/views/areas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar posición</h1>

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('positions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
