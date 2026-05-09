@extends('layouts.template')

@section('title', 'Edit Day')
@section('page_title', 'Edit Day')
@section('breadcrumb', 'Edit Day')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Day</h3>
    </div>

    <form action="{{ route('days.update', $day) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Day Name</label>
                <input type="text" name="day_name" class="form-control" value="{{ old('day_name', $day->day_name) }}">
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('days.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection