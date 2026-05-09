@extends('layouts.template')

@section('title', 'Groups')
@section('page_title', 'Lecturer Groups List')
@section('breadcrumb', 'Groups')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lecturer Groups List</h3>

        <div class="card-tools">
            <a href="{{ route('groups.create') }}" class="btn btn-success btn-sm">
                + Add Group
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Group Name</th>
                <th>Part / Semester</th>
                <th width="220">Actions</th>
            </tr>
            </thead>

            <tbody>
            @forelse($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->part ?? '-' }}</td>
                    <td>
                        <a href="{{ route('groups.show', $group) }}" class="btn btn-info btn-sm">
                            View
                        </a>

                        <a href="{{ route('groups.edit', $group) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('groups.destroy', $group) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this group?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No groups found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection