<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(74, 144, 226, 0.28), transparent 34%),
                linear-gradient(135deg, #061a38 0%, #0b2d5f 48%, #123f7a 100%);
        }

        .auth-shell {
            min-height: 100vh;
            padding: 32px 16px;
        }

        .auth-card {
            width: 100%;
            max-width: 560px;
            border: 0;
            border-radius: 8px;
            box-shadow: 0 24px 60px rgba(3, 16, 35, 0.32);
        }

        .brand-icon {
            width: 64px;
            height: 64px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            border-radius: 8px;
            box-shadow: 0 12px 28px rgba(13, 110, 253, 0.34);
        }

        .input-group-text {
            color: #0b5ed7;
            background-color: #f4f8ff;
            border-right: 0;
        }

        .form-control {
            border-left: 0;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #86b7fe;
        }

        .input-group:focus-within .input-group-text {
            border-color: #86b7fe;
            background-color: #eef5ff;
        }
    </style>
</head>
<body>
    <main class="auth-shell d-flex align-items-center justify-content-center">
        <div class="card auth-card">
            <div class="card-body p-4 p-sm-5">
                <div class="text-center mb-4">
                    <div class="brand-icon mb-3">
                        <i class="bi bi-person-badge-fill fs-2"></i>
                    </div>
                    <h1 class="h3 fw-bold text-dark mb-2">Create Account</h1>
                    <p class="text-secondary mb-0">Register admin access for the system</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <div class="d-flex gap-2">
                            <i class="bi bi-exclamation-triangle-fill flex-shrink-0"></i>
                            <div>
                                <strong>Please review the form.</strong>
                                <ul class="mb-0 mt-2 ps-3">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name') }}" autocomplete="name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="admin@example.com" value="{{ old('email') }}" autocomplete="email">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label fw-semibold">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Enter phone number" value="{{ old('phone_number') }}" autocomplete="tel">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-semibold">Address</label>
                        <div class="input-group">
                            <span class="input-group-text align-items-start pt-2"><i class="bi bi-geo-alt-fill"></i></span>
                            <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter address" autocomplete="street-address">{{ old('address') }}</textarea>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Create password" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password" autocomplete="new-password">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                        Create Account
                    </button>
                </form>

                <div class="text-center mt-4">
                    <span class="text-secondary">Already registered?</span>
                    <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Login here</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
