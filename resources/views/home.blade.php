@extends('layouts.template')

@section('title', 'Dashboard')
@section('page_title', 'Admin Dashboard')
@section('breadcrumb', 'Dashboard')
@section('body_class', 'dashboard-bg')

@push('styles')
<style>
    body.dashboard-bg .app-main {
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.75), rgba(255, 255, 255, 0.75)),
            url("{{ asset('admin/dist/assets/img/photo1.png') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        min-height: 100vh;
    }

    body.dashboard-bg .app-content-header,
    body.dashboard-bg .app-content {
        background: transparent;
    }

    body.dashboard-bg .small-box {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
            <div class="inner">
                <h3>Students</h3>
                <p>Manage student records</p>
            </div>

            <div class="small-box-icon">
                <i class="bi bi-people-fill"></i>
            </div>

            <a href="{{ route('students.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                More info <i class="bi bi-link-45deg"></i>
            </a>
        </div>
    </div>
</div>
@endsection