<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Register') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Custom Style -->
        <style>
            body {
                background-color: #e8f5e9; /* Background hijau muda */
                font-family: 'Poppins', sans-serif;
            }

            .card-custom {
                border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                background: #ffffff;
                padding: 2rem;
            }

            .form-control:focus {
                border-color: #2e7d32;
                box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.25);
            }

            .btn-custom {
                background-color: #2e7d32; /* Hijau tua */
                color: #ffffff;
            }

            .btn-custom:hover {
                background-color: #1b5e20;
            }

            .link-custom {
                color: #2e7d32;
                text-decoration: none;
            }

            .link-custom:hover {
                color: #1b5e20;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="card-custom w-100" style="max-width: 500px;">
                <h3 class="text-center mb-4 text-success">Register</h3>

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                        @if($errors->has('name'))
                            <div class="text-danger mt-1">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @if($errors->has('email'))
                            <div class="text-danger mt-1">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        @if($errors->has('password'))
                            <div class="text-danger mt-1">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        @if($errors->has('password_confirmation'))
                            <div class="text-danger mt-1">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <!-- Footer -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('login') }}" class="link-custom">Already registered?</a>
                        <button type="submit" class="btn btn-custom px-4">Register</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
