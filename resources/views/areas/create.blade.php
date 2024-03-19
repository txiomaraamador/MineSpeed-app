<!-- resources/views/areas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Area</h1>

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('areas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="topographic_information">Topographic Information:</label>
                        <textarea name="topographic_information" id="topographic_information" class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
