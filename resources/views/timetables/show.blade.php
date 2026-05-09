@extends('layouts.template')

@section('title', 'Timetable Details')
@section('page_title', 'Timetable Entry Details')
@section('breadcrumb', 'Timetable Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Timetable Entry Details</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="200">Lecturer</th>
                    <td>{{ $timetable->subject?->lecturer_name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td>{{ $timetable->subject?->subject_code ?? '-' }} - {{ $timetable->subject?->subject_name ?? '-' }}
                    </td>
                </tr>
                <tr>
                    <th>Day</th>
                    <td>{{ $timetable->day?->day_name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Hall</th>
                    <td>{{ $timetable->hall?->lecture_hall_name ?? '-' }} -
                        {{ $timetable->hall?->lecture_hall_place ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Group</th>
                    <td>{{ $timetable->lecturerGroup?->name ?? '-' }}
                        {{ $timetable->lecturerGroup?->part ? '(' . $timetable->lecturerGroup->part . ')' : '' }}</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>{{ $timetable->time_from }} - {{ $timetable->time_to }}</td>
                </tr>
            </table>
        </div>

        <div class="card-footer">
            <a href="{{ route('timetables.edit', $timetable) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('timetables.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection