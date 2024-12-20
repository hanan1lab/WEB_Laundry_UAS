<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Flexbox untuk menempatkan footer di bagian paling bawah */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-image: url('https://images.unsplash.com/photo-1604335398980-ededcadcc37d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');

        }
        .content {
            flex: 1;
        }

        /* Kartu Dashboard */
        .stat-card {
            padding: 20px;
            border-radius: 10px;
            color: #fff;
            font-weight: bold;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card-title {
            margin: 0;
            font-size: 2rem;
        }
        .card-text {
            margin: 0;
            font-size: 1.2rem;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 10px 0;
            background-color: #343a40; /* Warna hitam agak abu */
            color: #fff; /* Warna teks putih */
            margin-top: auto;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transaksi.index') }}">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pembelian.index') }}">Pembelian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services.index') }}">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan.index') }}">Laporan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4 content">
        <div class="row mt-4">
            <!-- Antrian -->
            <div class="col-md-3">
                <div class="stat-card" style="background-color: #007bff;">
                    <div>
                        <h3 class="card-title">{{ $antrian }}</h3>
                        <p class="card-text">Antrian</p>
                    </div>
                </div>
            </div>
            <!-- Proses -->
            <div class="col-md-3">
                <div class="stat-card" style="background-color:rgb(213, 234, 60);">
                    <div>
                        <h3 class="card-title">{{ $proses }}</h3>
                        <p class="card-text">Proses</p>
                    </div>
                </div>
            </div>
            <!-- Selesai -->
            <div class="col-md-3">
                <div class="stat-card" style="background-color: #28a745;">
                    <div>
                        <h3 class="card-title">{{ $selesai }}</h3>
                        <p class="card-text">Selesai</p>
                    </div>
                </div>
            </div>
            <!-- Dibatalkan -->
            <div class="col-md-3">
                <div class="stat-card" style="background-color: #dc3545;">
                    <div>
                        <h3 class="card-title">{{ $dibatalkan }}</h3>
                        <p class="card-text">Dibatalkan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; {{ date('Y') }} Fast Laundry. All Rights Reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        if (performance.navigation.type === 1) {
            console.log("Halaman direfresh.");
        } else {
            location.reload();
        }
    </script>
</body>
</html>