<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Posyandu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #2a9d8f, #e9c46a);
            color: #fff;
        }

        .navbar {
            position: absolute;
            top: 0;
            right: 0;
            padding: 15px 20px;
            display: flex;
            gap: 10px;
            z-index: 10;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            background: rgba(0, 0, 0, 0.2);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 1rem;
            font-weight: 500;
            transition: background 0.3s;
        }

        .navbar a:hover {
            background: rgba(0, 0, 0, 0.4);
        }

        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100%;
            padding: 20px;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .hero-image {
            width: 100%;
            max-width: 450px;
            margin-top: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        footer {
            margin-top: 40px;
            font-size: 0.9rem;
            color: #333;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ url('/login') }}">
            <i class="bi bi-box-arrow-in-right"></i> Login
        </a>
        <a href="{{ url('/register') }}">
            <i class="bi bi-person-plus"></i> Register
        </a>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h1 class="hero-title">Selamat Datang di Posyandu</h1>
        <p class="hero-subtitle">Dukung kesehatan lansia dan balita dengan teknologi pencatatan modern.</p>
        <img src="{{ asset('gambar/gambar.jpg') }}" alt="Ilustrasi Posyandu" class="hero-image">
        <footer>
            © 2024 Sistem Pencatatan Posyandu. Semua Hak Dilindungi.
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
