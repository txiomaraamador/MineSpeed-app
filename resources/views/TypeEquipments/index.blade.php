
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of Equipaments</h1>

        <a href="{{ route('TypeEquipments.create') }}" class="btn btn-primary mb-3">Create typeequipment</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Make</th>
                    <th>Description</th>
                    <th>Model</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TypeEquipments as $typeequipment)
                    <tr>
                        <td>{{ $typeequipment->make }}</td>
                        <td>{{ $typeequipment->description}}</td>
                        <td>{{ $typeequipment->model}}</td>
                        <td>{{ $typeequipment->created_at}}</td>
                        <td>{{ $typeequipment->updated_at}}</td>
                        <td>
                            <a href="{{ route('TypeEquipments.show', $typeequipment->id) }}" class="btn btn-info btn-action">View</a>
                            <a href="{{ route('TypeEquipments.edit', $typeequipment->id) }}" class="btn btn-primary btn-action">Edit</a>
                            <form action="{{ route('TypeEquipments.destroy', $typeequipment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
