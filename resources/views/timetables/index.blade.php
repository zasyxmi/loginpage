@extends('layouts.template')

@section('title', 'Timetables')
@section('page_title', 'Timetable Entries')
@section('breadcrumb', 'Timetables')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Timetable Entries</h3>
        <div class="card-tools">
            <a href="{{ route('timetables.create') }}" class="btn btn-success btn-sm">+ Add Entry</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Lecturer</th>
                <th>Subject</th>
                <th>Day</th>
                <th>Time</th>
                <th>Hall</th>
                <th>Group</th>
                <th width="220">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($timetables as $timetable)
                <tr>
                    <td>{{ $timetable->id }}</td>
                    <td>
                        {{ $timetable->student?->name ?? '-' }}
                        @if($timetable->student?->email)
                            <br><small class="text-muted">{{ $timetable->student->email }}</small>
                        @endif
                    </td>
                    <td>{{ $timetable->subject?->lecturer_name ?? '-' }}</td>
                    <td>
                        {{ $timetable->subject?->subject_code ?? '-' }}
                        @if($timetable->subject?->subject_name)
                            <br><small class="text-muted">{{ $timetable->subject->subject_name }}</small>
                        @endif
                    </td>
                    <td>{{ $timetable->day?->day_name ?? '-' }}</td>
                    <td>{{ $timetable->time_from }} - {{ $timetable->time_to }}</td>
                    <td>{{ $timetable->hall?->lecture_hall_name ?? '-' }}</td>
                    <td>{{ $timetable->lecturerGroup?->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('timetables.show', $timetable) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('timetables.edit', $timetable) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('timetables.destroy', $timetable) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this entry?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center">No timetable entries found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
