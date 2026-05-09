@extends('layouts.template')

@section('title', 'Halls')
@section('page_title', 'Halls List')
@section('breadcrumb', 'Halls')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Halls List</h3>
        <div class="card-tools">
            <a href="{{ route('halls.create') }}" class="btn btn-success btn-sm">+ Add Hall</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Hall Name</th>
                <th>Location</th>
                <th width="220">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($halls as $hall)
                <tr>
                    <td>{{ $hall->id }}</td>
                    <td>{{ $hall->lecture_hall_name }}</td>
                    <td>{{ $hall->lecture_hall_place }}</td>
                    <td>
                        <a href="{{ route('halls.show', $hall) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('halls.edit', $hall) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('halls.destroy', $hall) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this hall?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No halls found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection