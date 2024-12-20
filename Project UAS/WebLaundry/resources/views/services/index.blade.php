<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar Layanan</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            color: #555;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            opacity: 0;
            animation: fadeInUp 0.5s forwards;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        th {
            background-color: #007BFF;
            color: white;
            transition: background-color 0.3s ease;
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #c82333;
            transform: scale(1.1);
        }
        .button-detail {
    background-color: #F7AA00;  /* Warna biru muda untuk tombol Detail */
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .button-detail:hover {
    background-color: #0056b3;  /* Warna biru lebih gelap saat hover */
    transform: scale(1.05);
        }

        /* Tambahkan jarak untuk tombol tambah layanan */
        .add-service-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .add-service-btn:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        /* Media Query untuk Responsivitas */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }

            table {
                width: 100%;
                margin: 10px 0;
            }

            th, td {
                padding: 0.8rem;
            }
        }
    </style>
</head>
<body>

    <h1>Daftar Layanan</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Layanan</th>
                <th>Harga per Kg/Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $index=> $service)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ number_format($service->price_per_kg, 2) }}</td>
                    <td>
                        <a href="{{ route('services.show', $service->id) }}" class="button-detail">Detail</a>
                        <a href="{{ route('services.edit', $service->id) }}">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada layanan tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tombol Tambah Layanan -->
    <a href="{{ route('services.create') }}" class="add-service-btn">Tambah Layanan</a>

    <a href="{{ route('home.admin') }}">Kembali ke Halaman Admin</a>

</body>
</html>
