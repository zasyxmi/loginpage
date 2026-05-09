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

    .dashboard-welcome {
        background: rgba(255, 255, 255, 0.92);
        border-left: 4px solid #0d6efd;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
    }

    .quick-action-card {
        border: 0;
        border-radius: 8px;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.14);
        transition: transform 0.18s ease, box-shadow 0.18s ease;
        overflow: hidden;
    }

    .quick-action-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(15, 23, 42, 0.18);
    }

    .quick-action-icon {
        width: 48px;
        height: 48px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        font-size: 1.45rem;
    }

    .quick-action-count {
        font-size: 1.75rem;
        font-weight: 700;
        line-height: 1;
    }

    .quick-action-links {
        background: rgba(248, 249, 250, 0.9);
        border-top: 1px solid rgba(0, 0, 0, 0.06);
    }

    .quick-action-links .btn {
        min-width: 92px;
    }
</style>
@endpush

@section('content')
@php
    $quickActions = [
        [
            'title' => 'Students',
            'count' => $stats['students'],
            'icon' => 'bi-people-fill',
            'color' => 'primary',
            'list_route' => route('students.index'),
            'create_route' => route('students.create'),
        ],
        [
            'title' => 'Subjects',
            'count' => $stats['subjects'],
            'icon' => 'bi-book',
            'color' => 'success',
            'list_route' => route('subjects.index'),
            'create_route' => route('subjects.create'),
        ],
        [
            'title' => 'Halls',
            'count' => $stats['halls'],
            'icon' => 'bi-building',
            'color' => 'warning',
            'list_route' => route('halls.index'),
            'create_route' => route('halls.create'),
        ],
        [
            'title' => 'Days',
            'count' => $stats['days'],
            'icon' => 'bi-calendar',
            'color' => 'info',
            'list_route' => route('days.index'),
            'create_route' => route('days.create'),
        ],
        [
            'title' => 'Groups',
            'count' => $stats['groups'],
            'icon' => 'bi-people',
            'color' => 'danger',
            'list_route' => route('groups.index'),
            'create_route' => route('groups.create'),
        ],
        [
            'title' => 'Timetable',
            'count' => $stats['timetables'],
            'icon' => 'bi-calendar-week',
            'color' => 'secondary',
            'list_route' => route('timetables.index'),
            'create_route' => route('timetables.create'),
        ],
    ];
@endphp

<div class="dashboard-welcome rounded p-4 mb-4">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
            <h4 class="mb-1">Welcome back, {{ auth()->user()->name }}</h4>
            <p class="text-muted mb-0">Quickly manage the main records from your admin dashboard.</p>
        </div>

        <a href="{{ route('timetables.create') }}" class="btn btn-primary">
            <i class="bi bi-calendar-plus"></i> Add Timetable
        </a>
    </div>
</div>

<div class="d-flex align-items-center justify-content-between mb-3">
    <h5 class="mb-0">Quick Actions</h5>
</div>

<div class="row g-3">
    @foreach($quickActions as $action)
        <div class="col-xl-4 col-md-6">
            <div class="card quick-action-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between gap-3">
                        <div>
                            <p class="text-muted mb-1">{{ $action['title'] }}</p>
                            <div class="quick-action-count">{{ $action['count'] }}</div>
                        </div>

                        <div class="quick-action-icon text-bg-{{ $action['color'] }}">
                            <i class="bi {{ $action['icon'] }}"></i>
                        </div>
                    </div>
                </div>

                <div class="quick-action-links px-3 py-3">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ $action['list_route'] }}" class="btn btn-outline-{{ $action['color'] }} btn-sm">
                            <i class="bi bi-list-ul"></i> View
                        </a>
                        <a href="{{ $action['create_route'] }}" class="btn btn-{{ $action['color'] }} btn-sm">
                            <i class="bi bi-plus-lg"></i> Add
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
