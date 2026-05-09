@extends('layouts.template')

@section('title', 'Student List')
@section('page_title', 'Student List')
@section('breadcrumb', 'Students')

@section('content')
<div class="row">
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Students</h3>

                <div class="card-tools">
                    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus"></i> Add Student
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th width="220">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->age ?? '-' }}</td>
                            <td>{{ $student->phone_number ?? '-' }}</td>
                            <td>{{ $student->address ?? '-' }}</td>
                            <td>
                                <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-info">
                                    View
                                </a>

                                <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this student?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No students found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection