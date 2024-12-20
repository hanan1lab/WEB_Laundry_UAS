<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f4f7fb;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #0077B6;
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-align: center;
        }

        .alert {
            animation: slideIn 0.5s ease-in-out;
        }

        .table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            animation: fadeIn 1s ease-in-out;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #0077B6;
            color: white;
        }

        .table tr:nth-child(even) {
            background-color: #f1faff;
        }

        .table tr:hover {
            background-color: #d1e7f7;
            transform: scale(1.02);
            transition: all 0.3s ease;
        }

        .btn {
            padding: 8px 15px;
            font-size: 1rem;
            border-radius: 6px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-warning {
            background-color: #f0ad4e;
            border: none;
        }

        .btn-warning:hover {
            background-color: #ec971f;
            transform: translateY(-3px);
        }

        .btn-dashboard {
            background-color: #0077B6;
            color: white;
            text-align: center;
            font-size: 1.1rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 6px;
            padding: 10px 20px;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease, color 0.3s ease;
        }

        .btn-dashboard:hover {
            background-color: #FF8000;
            color: white;  /* Change text color to white on hover */
            transform: translateY(-3px);
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .btn-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Daftar Transaksi</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Service</th>
                    <th>Berat (Kg)</th>
                    <th>Total Harga</th>
                    <th>Status Transaksi</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->order->customer_name }}</td>
                        <td>{{ $transaksi->order->address }}</td>
                        <td>{{ $transaksi->order->service->name }}</td>
                        <td>{{ $transaksi->order->weight }} Kg</td>
                        <td>{{ number_format($transaksi->order->total_price, 2) }}</td>
                        <td>{{ $transaksi->status }}</td>
                        <td>{{ $transaksi->payment_status }}</td>
                        <td>
                            <a href="/transaksi/{{ $transaksi->order_id }}/edit" class="btn btn-warning">Edit Status</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada transaksi yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="btn-wrapper">
        <a href="{{ route('home.admin') }}" class="btn-dashboard">Kembali ke Dashboard</a>
    </div>

    <!-- Menambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
