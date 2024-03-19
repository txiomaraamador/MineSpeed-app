
@extends('layouts.app')

@section('content')
    <h1>Edit Position</h1>

    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $position->name }}" class="form-control" required>
        </div>

        {{-- Agrega más campos del formulario según tus necesidades --}}

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
