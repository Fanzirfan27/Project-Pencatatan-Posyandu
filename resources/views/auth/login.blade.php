<x-guest-layout>
    <style>
        body {
            background-color: #f0f8f1; /* Warna hijau muda */
            font-family: Arial, sans-serif;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            padding: 2rem;
        }
        .login-header {
            color: #198754; /* Hijau */
            font-weight: bold;
        }
        .btn-login {
            background-color: #198754;
            color: white;
            font-weight: bold;
        }
    </style>

    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="login-card">
            <h2 class="text-center login-header">Login</h2>
            <p class="text-center text-muted mb-4">Please sign in to continue</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" required autofocus>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-login">Log In</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
