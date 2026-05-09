@extends('layouts.template')

@section('title', 'Subjects')
@section('page_title', 'Subjects List')
@section('breadcrumb', 'Subjects')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Subjects List</h3>
        <div class="card-tools">
            <a href="{{ route('subjects.create') }}" class="btn btn-success btn-sm">+ Add Subject</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Lecturer Name</th>
                <th width="220">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->subject_code }}</td>
                    <td>{{ $subject->subject_name }}</td>
                    <td>{{ $subject->lecturer_name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('subjects.show', $subject) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('subjects.destroy', $subject) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this subject?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No subjects found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection