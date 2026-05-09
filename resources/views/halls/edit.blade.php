@extends('layouts.template')

@section('title', 'Edit Hall')
@section('page_title', 'Edit Hall')
@section('breadcrumb', 'Edit Hall')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Hall</h3>
    </div>

    <form action="{{ route('halls.update', $hall) }}" method="POST">
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
                <label class="form-label">Hall Name</label>
                <input type="text" name="lecture_hall_name" class="form-control" value="{{ old('lecture_hall_name', $hall->lecture_hall_name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="lecture_hall_place" class="form-control" value="{{ old('lecture_hall_place', $hall->lecture_hall_place) }}">
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('halls.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection