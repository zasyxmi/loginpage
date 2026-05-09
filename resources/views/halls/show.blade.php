@extends('layouts.template')

@section('title', 'Hall Details')
@section('page_title', 'Hall Details')
@section('breadcrumb', 'Hall Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Hall Details</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="200">Hall Name</th>
                <td>{{ $hall->lecture_hall_name }}</td>
            </tr>
            <tr>
                <th>Location</th>
                <td>{{ $hall->lecture_hall_place }}</td>
            </tr>
        </table>
    </div>

    <div class="card-footer">
        <a href="{{ route('halls.edit', $hall) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('halls.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection