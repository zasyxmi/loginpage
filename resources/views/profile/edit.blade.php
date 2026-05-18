@extends('layouts.template')

@section('title', 'Edit Profile')
@section('page_title', 'Edit Profile')
@section('breadcrumb', 'Profile')

@section('content')
@php
    $profilePhoto = $user->profile_photo
        ? asset('storage/' . $user->profile_photo)
        : asset('admin/dist/assets/img/user2-160x160.jpg');
@endphp

<div class="row">
    <div class="col-md-8">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Admin Profile</h3>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <img src="{{ $profilePhoto }}"
                             class="rounded-circle shadow"
                             alt="Profile Photo"
                             style="width: 96px; height: 96px; object-fit: cover;">

                        <div class="flex-grow-1">
                            <label for="profile_photo" class="form-label">Profile Photo</label>
                            <input type="file"
                                   class="form-control"
                                   id="profile_photo"
                                   name="profile_photo"
                                   accept="image/png,image/jpeg,image/webp">
                            <div class="form-text">Upload JPG, PNG, or WEBP image up to 2MB.</div>

                            @if($user->profile_photo)
                                <div class="form-check mt-2">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           value="1"
                                           id="remove_profile_photo"
                                           name="remove_profile_photo">
                                    <label class="form-check-label" for="remove_profile_photo">
                                        Remove current photo
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               class="form-control"
                               id="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text"
                               class="form-control"
                               id="age"
                               name="age"
                               value="{{ old('age', $user->age) }}">
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text"
                               class="form-control"
                               id="phone_number"
                               name="phone_number"
                               value="{{ old('phone_number', $user->phone_number) }}">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control"
                                  id="address"
                                  name="address"
                                  rows="3">{{ old('address', $user->address) }}</textarea>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password"
                               class="form-control"
                               id="password"
                               name="password"
                               autocomplete="new-password">
                        <div class="form-text">Leave blank if you do not want to change password.</div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password"
                               class="form-control"
                               id="password_confirmation"
                               name="password_confirmation"
                               autocomplete="new-password">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
