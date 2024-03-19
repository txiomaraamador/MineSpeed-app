
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of Areas</h1>

        <a href="{{ route('areas.create') }}" class="btn btn-primary mb-3">Create Area</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Topographic Information</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area)
                    <tr>
                        <td>{{ $area->name }}</td>
                        <td>{{ $area->topographic_information }}</td>
                        <td>{{ $area->created_at}}</td>
                        <td>{{ $area->updated_at}}</td>
                        <td>
                            <a href="{{ route('areas.show', $area->id) }}" class="btn btn-info btn-action">View</a>
                            <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-primary btn-action">Edit</a>
                            <form action="{{ route('areas.destroy', $area->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
