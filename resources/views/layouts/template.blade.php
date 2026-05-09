<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Management System')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Fonts & Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    {{-- AdminLTE CSS --}}
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.css') }}">
    @stack('styles')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary @yield('body_class')">
@php
    $authUser = auth()->user();
    $profilePhoto = $authUser?->profile_photo
        ? asset('storage/' . $authUser->profile_photo)
        : asset('admin/dist/assets/img/user1-128x128.jpg');
@endphp
<div class="app-wrapper">

    {{-- Navbar --}}
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i>
                    </a>
                </li>

                <li class="nav-item d-none d-md-block">
                    <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">

    {{-- Search Icon --}}
    <li class="nav-item">
        <a class="nav-link" href="#" role="button">
            <i class="bi bi-search"></i>
        </a>
    </li>

    {{-- Fullscreen Icon --}}
    <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen" role="button">
            <i class="bi bi-arrows-fullscreen"></i>
        </a>
    </li>

    {{-- User Dropdown --}}
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img src="{{ $profilePhoto }}"
                 class="user-image rounded-circle shadow"
                 alt="User Image">

            <span class="d-none d-md-inline">
                {{ $authUser->name }}
            </span>
        </a>

        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

            {{-- User Image Header --}}
            <li class="user-header text-bg-primary">
                <img src="{{ $profilePhoto }}"
                     class="rounded-circle shadow"
                     alt="User Image">

                <p>
                    {{ $authUser->name }} - {{ $authUser->email }}

                    <small>
                        Member since {{ $authUser->created_at->format('Y-m-d H:i:s') }}
                    </small>
                </p>
            </li>

            {{-- Logout Footer --}}
            <li class="user-footer">
                <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">
                    <i class="bi bi-person-gear"></i> Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-default btn-flat float-end">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </li>
</ul>
        </div>
    </nav>

    {{-- Sidebar --}}
    <aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('admin/dist/assets/img/AdminLTELogo.png') }}"
                     alt="Logo"
                     class="brand-image opacity-75 shadow">

                <span class="brand-text fw-light">Management System</span>
            </a>
        </div>

        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="menu"
                    data-accordion="false">

                    {{-- Dashboard --}}
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->routeIs('dashboard') || request()->routeIs('home') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Admin Profile --}}
                    <li class="nav-item">
                        <a href="{{ route('profile.edit') }}"
                           class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-gear"></i>
                            <p>Admin Profile</p>
                        </a>
                    </li>

                    {{-- Student Management --}}
                    <li class="nav-item {{ request()->routeIs('students.*') ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>
                                Student Management
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('students.index') }}"
                                   class="nav-link {{ request()->routeIs('students.index') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>List Students</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('students.create') }}"
                                   class="nav-link {{ request()->routeIs('students.create') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Add Student</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Subjects --}}
                    <li class="nav-item {{ request()->routeIs('subjects.*') ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ request()->routeIs('subjects.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-book"></i>
                            <p>
                                Subjects
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('subjects.index') }}"
                                   class="nav-link {{ request()->routeIs('subjects.index') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>List Subjects</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('subjects.create') }}"
                                   class="nav-link {{ request()->routeIs('subjects.create') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Add Subject</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Halls --}}
                    <li class="nav-item {{ request()->routeIs('halls.*') ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ request()->routeIs('halls.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-building"></i>
                            <p>
                                Halls
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('halls.index') }}"
                                   class="nav-link {{ request()->routeIs('halls.index') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>List Halls</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('halls.create') }}"
                                   class="nav-link {{ request()->routeIs('halls.create') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Add Hall</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Days --}}
                    <li class="nav-item {{ request()->routeIs('days.*') ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ request()->routeIs('days.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-calendar"></i>
                            <p>
                                Days
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('days.index') }}"
                                   class="nav-link {{ request()->routeIs('days.index') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>List Days</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('days.create') }}"
                                   class="nav-link {{ request()->routeIs('days.create') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Add Day</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Groups --}}
                    <li class="nav-item {{ request()->routeIs('groups.*') ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ request()->routeIs('groups.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-people"></i>
                            <p>
                                Groups
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('groups.index') }}"
                                   class="nav-link {{ request()->routeIs('groups.index') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>List Groups</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('groups.create') }}"
                                   class="nav-link {{ request()->routeIs('groups.create') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Add Group</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Timetable --}}
                    <li class="nav-item {{ request()->routeIs('timetables.*') ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ request()->routeIs('timetables.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-calendar-week"></i>
                            <p>
                                Timetable
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('timetables.index') }}"
                                   class="nav-link {{ request()->routeIs('timetables.index') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>View Entries</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('timetables.create') }}"
                                   class="nav-link {{ request()->routeIs('timetables.create') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Add Entry</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">@yield('page_title', 'Dashboard')</h3>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                @yield('breadcrumb', 'Dashboard')
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">
            Laravel Lab 5
        </div>

        <strong>AdminLTE Integration</strong>
    </footer>

</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
</body>
</html>
