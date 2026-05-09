@extends('layouts.template')

@section('title', 'Add Timetable')
@section('page_title', 'Add Timetable Entry')
@section('breadcrumb', 'Add Timetable')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Timetable Entry</h3>
        </div>

        <form action="{{ route('timetables.store') }}" method="POST">
            @csrf

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
                        <label class="form-label">Subject / Lecturer</label>
                        <select name="subject_id" class="form-control">
                            <option value="">-- Select Lecturer Name --</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" @selected(old('subject_id') == $subject->id)>
                                    {{ $subject->lecturer_name ?? 'No Lecturer' }} - {{ $subject->subject_code }} -
                                    {{ $subject->subject_name }}
                                </option>
                            @endforeach

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Day</label>
                                <select name="day_id" class="form-control">
                                    <option value="">-- Select Day --</option>
                                    @foreach($days as $day)
                                        <option value="{{ $day->id }}" @selected(old('day_id') == $day->id)>
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
                                        <option value="{{ $hall->id }}" @selected(old('hall_id') == $hall->id)>
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
                                        <option value="{{ $group->id }}" @selected(old('lecturer_group_id') == $group->id)>
                                            {{ $group->name }} {{ $group->part ? '(' . $group->part . ')' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Time From</label>
                                <input type="time" name="time_from" class="form-control" value="{{ old('time_from') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Time To</label>
                                <input type="time" name="time_to" class="form-control" value="{{ old('time_to') }}">
                            </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-success">Save</button>
                    <a href="{{ route('timetables.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
        </form>
    </div>
@endsection