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
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th width="180">ID</th>
                                <td>{{ $timetable->id }}</td>
                            </tr>
                            <tr>
                                <th>Student</th>
                                <td>
                                    {{ $timetable->student?->name ?? '-' }}
                                    @if($timetable->student?->email)
                                        <br><small class="text-muted">{{ $timetable->student->email }}</small>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Subject</th>
                                <td>
                                    {{ $timetable->subject?->subject_code ?? '-' }} -
                                    {{ $timetable->subject?->subject_name ?? '-' }}
                                    @if($timetable->subject?->lecturer_name)
                                        <br><small class="text-muted">{{ $timetable->subject->lecturer_name }}</small>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Day</th>
                                <td>{{ $timetable->day?->day_name ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th width="180">Time</th>
                                <td>{{ $timetable->time_from }} - {{ $timetable->time_to }}</td>
                            </tr>
                            <tr>
                                <th>Hall</th>
                                <td>
                                    {{ $timetable->hall?->lecture_hall_name ?? '-' }}
                                    @if($timetable->hall?->lecture_hall_place)
                                        <br><small class="text-muted">{{ $timetable->hall->lecture_hall_place }}</small>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Group</th>
                                <td>
                                    {{ $timetable->lecturerGroup?->name ?? '-' }}
                                    {{ $timetable->lecturerGroup?->part ? '(' . $timetable->lecturerGroup->part . ')' : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Created</th>
                                <td>{{ $timetable->created_at?->format('d M Y, h:i A') ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated</th>
                                <td>{{ $timetable->updated_at?->format('d M Y, h:i A') ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('timetables.edit', $timetable) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('timetables.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
