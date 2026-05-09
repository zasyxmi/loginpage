@extends('layouts.template')

@section('title', 'Student Details')
@section('page_title', 'Student Details')
@section('breadcrumb', 'Student Details')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Student Information</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="200">Name</th>
                        <td>{{ $student->name }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $student->email }}</td>
                    </tr>

                    <tr>
                        <th>Age</th>
                        <td>{{ $student->age ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $student->phone_number ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>{{ $student->address ?? '-' }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-footer">
                <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">
                    Edit
                </a>

                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection