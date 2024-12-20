<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Home | Laundry Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('https://images.unsplash.com/photo-1604335398980-ededcadcc37d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: rgba(17, 62, 110, 0.71); 
            font-size: 16px;
            border-bottom: 4px solid #0056b3; 
        }
        header h1 {
            font-size: 24px;
            margin: 0;
        }

        .content {
            flex: 1;
        }

        .jumbotron {
            padding: 10px; 
            background-color:rgba(0, 123, 255, 0.94);
            color: #ffffff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .jumbotron h1 {
            font-size: 36px; 
            margin-bottom: 10px; 
            font-weight: bold; 
        }

        .jumbotron p {
            font-size: 16px; 
            margin-bottom: 0; 
        }

        /* Section Layanan Kami */
        .services-section h2 {
            font-size: 30px;
            color: white; 
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px #000; 
        }

        /* Card Layanan */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 10px;
        }

        .card:hover {
            transform: scale(1.05); 
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #007bff; /* */
            color: white;
            font-weight: bold;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body p {
            font-size: 16px;
            color: #555;
            text-align: center;
        }

        /* Tombol Order */
        .order-btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .order-btn-container a {
            transition: all 0.3s ease;
        }

        .order-btn-container a:hover {
            transform: scale(1.1);
        }

        /* Footer */
        footer {
            background-color: rgb(14, 100, 187);
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
            margin-top: auto;
        }

        .card:active {
            transform: scale(0.95); /* Card sedikit mengecil */
            transition: transform 0.1s ease;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="text-white">Fast Laundry</h1>
            <nav>
                <div class="dropdown">
                    <a class="btn btn-light dropdown-toggle btn-sm" href="#" id="userDropdown" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Status Pesanan -->
    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif

    <div class="jumbotron">
        <h1>Selamat Datang di Fast Laundry</h1>
        <p>Layanan Laundry Cepat, Murah, dan Berkualitas untuk Anda</p>
    </div>

    <div class="container my-4 services-section">
        <h2 class="text-center">Layanan Kami</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($services as $service)
                <div class="col">
                    <div class="card">
                        <h5 class="card-header">{{ $service->name }}</h5>
                        <div class="card-body">
                            <p>Harga: Rp{{ number_format($service->price_per_kg, 0, ',', '.') }} /kg</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Tidak ada layanan tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <div class="order-btn-container mt-4">
            <a href="orders" class="btn btn-primary btn-lg">Pesan Sekarang</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2024 Fast Laundry. All rights reserved.
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>
</body>
</html>
