@extends('layouts.template')

@section('title', 'Add Day')
@section('page_title', 'Add Day')
@section('breadcrumb', 'Add Day')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add New Day</h3>
    </div>

    <form action="{{ route('days.store') }}" method="POST">
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
                <label class="form-label">Day Name</label>
                <input type="text" name="day_name" class="form-control" value="{{ old('day_name') }}">
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-success">Save</button>
            <a href="{{ route('days.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection