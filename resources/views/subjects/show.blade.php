@extends('layouts.template')

@section('title', 'Subject Details')
@section('page_title', 'Subject Details')
@section('breadcrumb', 'Subject Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Subject Details</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr><th width="200">Subject Code</th><td>{{ $subject->subject_code }}</td></tr>
            <tr><th>Subject Name</th><td>{{ $subject->subject_name }}</td></tr>
            <tr><th>Lecturer Name</th><td>{{ $subject->lecturer_name ?? '-' }}</td></tr>
        </table>
    </div>

    <div class="card-footer">
        <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection