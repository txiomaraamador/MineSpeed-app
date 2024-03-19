<!-- resources/views/positions/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of positions</h1>

        <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">Create position</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positions as $position)
                    <tr>
                        <td>{{ $position->name }}</td>
                        <td>
                            <a href="{{ route('positions.show', $position->id) }}" class="btn btn-info btn-action">View</a>
                            <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-primary btn-action">Edit</a>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="d-inline">
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
