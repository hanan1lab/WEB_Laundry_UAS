<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>

    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef6fc; /* Putih dengan sedikit kebiruan */
            color: #333;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            color: #0077B6; /* Warna biru untuk header */
            margin: 2rem 0;
        }

        table {
            width: 90%;
            margin: 1rem auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 1rem;
            text-align: left;
        }

        th {
            background-color: #0077B6; /* Warna biru untuk header tabel */
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f0faff; /* Warna biru muda untuk baris genap */
        }

        tr:hover {
            background-color: #e3f3ff; /* Warna hover */
        }

        td {
            color: #555;
            border-bottom: 1px solid #ddd;
        }

        a {
            text-decoration: none;
            background-color: #0077B6; /* Warna biru untuk tombol */
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 4px;
            font-size: 1rem;
            display: inline-block;
            margin: 1rem 0.5rem;
            transition: background-color 0.3s ease;
        }

        /* Kotak status */
        .status-box {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.9rem;
            color: white;
        }

        .status-antrian {
            background-color: #FFAA00; /* Kuning */
        }

        .status-Proses {
            background-color: #0077B6; /* Biru */
        }

        .status-Selesai {
            background-color: #28A745; /* Hijau */
        }

        .status-Dibatalkan {
            background-color: #FF0000; /* Merah */
        }

        p {
            font-size: 1rem;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            table {
                font-size: 0.9rem;
            }

            th, td {
                padding: 0.8rem;
            }

            a {
                font-size: 0.9rem;
                padding: 0.6rem 1.2rem;
            }
        }
    </style>
</head>
<body>

    <h1>Daftar Pesanan</h1>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Nomor HP</th>
                <th>Layanan</th>
                <th>Berat (kg)</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->service->name ?? 'Layanan Tidak Ditemukan' }}</td>
                    <td>{{ $order->weight }}</td>
                    <td>{{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        @if ($order->transaksi)
                            @if ($order->transaksi->status === 'antrian')
                                <span class="status-box status-antrian">Antrian</span>
                            @elseif ($order->transaksi->status === 'Proses')
                                <span class="status-box status-Proses">Proses</span>
                            @elseif ($order->transaksi->status === 'Selesai')
                                <span class="status-box status-Selesai">Selesai</span>
                            @elseif ($order->transaksi->status === 'Dibatalkan')
                                <span class="status-box status-Dibatalkan">Dibatalkan</span>
                            @else
                                <span class="status-box">Unknown</span>
                            @endif
                        @else
                            <span class="status-box">Belum Ada Transaksi</span>
                        @endif
                    </td>
                    <td>
                <!-- Tombol Edit -->
                <a href="{{ route('order.edit', $order->id) }}" class="btn-edit">Edit</a>
            </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('order.create') }}">Buat Order Baru</a>
    <a href="{{ route('home.konsumen') }}">Kembali ke dashboard</a>
    </body>
</html>
