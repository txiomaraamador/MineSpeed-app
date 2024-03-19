@extends('layouts.app')

@section('content')
    <h1>Edit Area</h1>

    <form action="{{ route('areas.update', $area->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $area->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="topographic_information">Topographic Information:</label>
            <textarea name="topographic_information" id="topographic_information" class="form-control" rows="4">{{ $area->topographic_information }}</textarea>
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
