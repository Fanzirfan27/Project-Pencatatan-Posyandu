<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Style -->
        <style>
            body {
                background-color: #e8f5e9; /* Background hijau muda */
                font-family: 'Poppins', sans-serif;
            }
            .logo-custom {
                color: #2e7d32; /* Hijau tua */
                font-size: 2.5rem;
                font-weight: bold;
                text-decoration: none;
            }

            .header-text {
                font-weight: bold;
                color: #2e7d32; /* Hijau tua */
                margin-bottom: 1rem;
            }
        </style>
    </head>
    <body>
        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center">

            <!-- Card -->
            <div class="card-custom w-100" style="max-width: 400px;">
                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
