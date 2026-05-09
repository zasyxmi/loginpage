@extends('layouts.template')

@section('title', 'Add Subject')
@section('page_title', 'Add New Subject')
@section('breadcrumb', 'Add Subject')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add New Subject</h3>
    </div>

    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf

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
                <label class="form-label">Subject Code</label>
                <input type="text" name="subject_code" class="form-control" value="{{ old('subject_code') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Subject Name</label>
                <input type="text" name="subject_name" class="form-control" value="{{ old('subject_name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Lecturer Name</label>
                <input type="text" name="lecturer_name" class="form-control" value="{{ old('lecturer_name') }}">
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-success">Save</button>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection