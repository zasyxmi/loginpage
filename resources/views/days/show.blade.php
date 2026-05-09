@extends('layouts.template')

@section('title', 'Day Details')
@section('page_title', 'Day Details')
@section('breadcrumb', 'Day Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Day Details</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="200">Day Name</th>
                <td>{{ $day->day_name }}</td>
            </tr>
        </table>
    </div>

    <div class="card-footer">
        <a href="{{ route('days.edit', $day) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('days.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection