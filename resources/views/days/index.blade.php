@extends('layouts.template')

@section('title', 'Days')
@section('page_title', 'Days List')
@section('breadcrumb', 'Days')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Days List</h3>
        <div class="card-tools">
            <a href="{{ route('days.create') }}" class="btn btn-success btn-sm">+ Add Day</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Day Name</th>
                <th width="220">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($days as $day)
                <tr>
                    <td>{{ $day->id }}</td>
                    <td>{{ $day->day_name }}</td>
                    <td>
                        <a href="{{ route('days.show', $day) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('days.edit', $day) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('days.destroy', $day) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this day?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center">No days found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection