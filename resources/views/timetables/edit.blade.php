@extends('layouts.template')

@section('title', 'Edit Timetable')
@section('page_title', 'Edit Timetable Entry')
@section('breadcrumb', 'Edit Timetable')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Timetable Entry</h3>
        </div>

        <form action="{{ route('timetables.update', $timetable) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-warning">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Student</label>
                        <select name="student_id" class="form-control">
                            <option value="">-- Select Student --</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" @selected(old('student_id', $timetable->student_id) == $student->id)>
                                    {{ $student->name }} - {{ $student->email }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Subject / Lecturer</label>
                        <select name="subject_id" class="form-control">
                            <option value="">-- Select Subject / Lecturer --</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" @selected(old('subject_id', $timetable->subject_id) == $subject->id)>
                                    {{ $subject->subject_code }} - {{ $subject->subject_name }} -
                                    {{ $subject->lecturer_name ?? 'No Lecturer' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Day</label>
                        <select name="day_id" class="form-control">
                            <option value="">-- Select Day --</option>
                            @foreach($days as $day)
                                <option value="{{ $day->id }}" @selected(old('day_id', $timetable->day_id) == $day->id)>
                                    {{ $day->day_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hall</label>
                        <select name="hall_id" class="form-control">
                            <option value="">-- Select Hall --</option>
                            @foreach($halls as $hall)
                                <option value="{{ $hall->id }}" @selected(old('hall_id', $timetable->hall_id) == $hall->id)>
                                    {{ $hall->lecture_hall_name }} - {{ $hall->lecture_hall_place }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Group</label>
                        <select name="lecturer_group_id" class="form-control">
                            <option value="">-- Select Group --</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" @selected(old('lecturer_group_id', $timetable->lecturer_group_id) == $group->id)>
                                    {{ $group->name }} {{ $group->part ? '(' . $group->part . ')' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Time From</label>
                        <input
                            type="time"
                            name="time_from"
                            lang="en-GB"
                            class="form-control form-control-lg"
                            value="{{ old('time_from', $timetable->time_from) }}"
                            step="1800"
                            onclick="this.showPicker && this.showPicker()"
                            onfocus="this.showPicker && this.showPicker()"
                            required
                        >
                        <small class="form-text text-muted">Select class start time</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Time To</label>
                        <input
                            type="time"
                            name="time_to"
                            lang="en-GB"
                            class="form-control form-control-lg"
                            value="{{ old('time_to', $timetable->time_to) }}"
                            step="1800"
                            onclick="this.showPicker && this.showPicker()"
                            onfocus="this.showPicker && this.showPicker()"
                            required
                        >
                        <small class="form-text text-muted">Select class end time</small>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('timetables.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
