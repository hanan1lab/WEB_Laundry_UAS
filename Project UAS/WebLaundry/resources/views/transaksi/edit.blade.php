<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Status dan Status Pembayaran</title>
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

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #0077B6;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #0077B6;
            border-radius: 6px;
            font-size: 1rem;
        }

        button[type="submit"] {
            background-color: #0077B6;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #005f87;
            transform: translateY(-3px);
        }

        a {
            display: inline-block;
            background-color: #f0ad4e;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            background-color: #ec971f;
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
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Edit Status dan Status Pembayaran</h1>

        <!-- Formulir untuk memperbarui status dan status pembayaran -->
        <div class="form-container">
            <form action="{{ route('transaksi.updateStatus', $order->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Ganti 'POST' dengan 'PUT' untuk mengupdate data -->

                <!-- Pilihan status order -->
                <div class="form-group">
                    <label for="status">Status Order:</label>
                    <select name="status" id="status" required>
                        <option value="Antrian" {{ $order->transaksi && $order->transaksi->status == 'Antrian' ? 'selected' : '' }}>Antrian</option>
                        <option value="Proses" {{ $order->transaksi && $order->transaksi->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $order->transaksi && $order->transaksi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="Dibatalkan" {{ $order->transaksi && $order->transaksi->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                </div>

                <!-- Pilihan status pembayaran -->
                <div class="form-group">
                    <label for="payment_status">Status Pembayaran:</label>
                    <select name="payment_status" id="payment_status" required>
                        <option value="Belum Dibayar" {{ $order->transaksi && $order->transaksi->payment_status == 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                        <option value="Sudah Dibayar" {{ $order->transaksi && $order->transaksi->payment_status == 'Sudah Dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
                    </select>
                </div>

                <!-- Tombol untuk submit -->
                <button type="submit">Update Status</button>
            </form>
        </div>

        <!-- Link kembali ke daftar order -->
        <div class="text-center mt-4">
            <a href="{{ route('transaksi.index') }}">Kembali ke Daftar Order</a>
        </div>

    </div>

    <!-- Menambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>