@extends('layouts.template')

@section('title', 'Group Details')
@section('page_title', 'Group Details')
@section('breadcrumb', 'Group Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Group Details</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="200">Group Name</th>
                <td>{{ $group->name }}</td>
            </tr>
            <tr>
                <th>Part / Semester</th>
                <td>{{ $group->part ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="card-footer">
        <a href="{{ route('groups.edit', $group) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('groups.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection