@extends('layouts.template')

@section('title', 'Edit Group')
@section('page_title', 'Edit Group')
@section('breadcrumb', 'Edit Group')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Group</h3>
    </div>

    <form action="{{ route('groups.update', $group) }}" method="POST">
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
                <label class="form-label">Group Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $group->name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Part / Semester</label>
                <input type="text" name="part" class="form-control" value="{{ old('part', $group->part) }}">
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('groups.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection