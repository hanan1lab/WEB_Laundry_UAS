<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px; /* Spasi lebih besar di bawah judul */
        }

        p {
            color: #555;
            text-align: center;
            margin-bottom: 30px; /* Spasi di bawah pesan */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            opacity: 0; /* Mulai dengan transparan */
            animation: fadeInUp 0.5s forwards; /* Menggunakan animasi fadeInUp */
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px); /* Muncul dari bawah */
            }
            100% {
                opacity: 1;
                transform: translateY(0); /* Posisi akhir */
            }
        }

        th, td {
            padding: 15px; /* Tambahkan padding lebih besar */
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF; /* Mengubah warna latar belakang menjadi biru */
            color: white;
            transition: background-color 0.3s ease; /* Transisi untuk perubahan warna */
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 15px;
            background-color: #007BFF; /* Warna biru untuk tautan */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            background-color: #0056b3; /* Warna biru gelap saat hover */
            transform: scale(1.05); /* Pembesaran saat hover */
        }

        form {
            display: inline;
        }

        button {
            background-color: #dc3545; /* Warna merah untuk tombol hapus */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Transisi untuk tombol */
        }

        button:hover {
            background-color: #c82333; /* Warna merah gelap saat hover */
            transform: scale(1.1); /* Pembesaran saat hover */
        }

        /* Media Query untuk Responsivitas */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem; /* Ukuran font lebih kecil untuk layar kecil */
            }

            table {
                width: 100%;
                margin: 10px 0; /* Mengurangi margin untuk layar kecil */
            }

            th, td {
                padding: 1rem; /* Mengurangi padding untuk elemen tabel */
            }

            a {
                padding: 8px 15px; /* Menyesuaikan ukuran padding tombol link */
                font-size: 0.9rem; /* Menyesuaikan ukuran font untuk layar kecil */
            }

            button {
                padding: 8px 15px; /* Menyesuaikan ukuran padding tombol hapus */
            }
        }
    </style>
</head>
<body>

    <h1>Daftar Pembelian</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($pembelians->isEmpty())
        <p>Tidak ada data pembelian.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Item</th>
                    <th>Harga Satuan</th>
                    <th>Kuantitas</th>
                    <th>Total Harga</th>
                    <th>Tanggal Pembelian</th>
                    <th>Aksi</th> <!-- Kolom aksi -->
                </tr>
            </thead>
            <tbody>
            @foreach($pembelians as $index => $pembelian)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembelian->item_name }}</td>
                    <td>{{ $pembelian->amount }}</td>
                    <td>{{ $pembelian->quantity }}</td>
                    <td>{{ $pembelian->total_price }}</td>
                    <td>{{ $pembelian->purchase_date }}</td>
                    <td>
                        <a href="{{ route('pembelian.show', $pembelian->id) }}">Detail</a> <!-- Link Detail -->
                        <a href="{{ route('pembelian.edit', $pembelian->id) }}">Edit</a>
                        <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('home.admin') }}">Kembali ke Halaman Admin</a>
    <a href="{{ route('pembelian.create') }}">Tambah Pembelian</a>
    <a href="{{ route('pembelian.trashed') }}" class="btn-trashed">Lihat Data Dihapus</a>


</body>
</html>
