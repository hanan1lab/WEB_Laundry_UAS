<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuntungan</title>

    <style>
    body {
        font-family: 'Poppins', Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #F4F6FF;
        color: #333;
        text-align: center;
        animation: fadeIn 1.5s ease-out;
    }

    h1 {
        font-size: 2.5rem;
        color: #0077B6; 
        margin: 2rem 0;
        animation: slideFromLeft 1s ease-out;
    }

    h3 {
        font-size: 1.5rem;
        color: #0077B6; 
        margin-top: 2rem;
        animation: slideFromLeft 1s ease-out;
    }

    table {
        width: 90%;
        margin: 1rem auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        animation: fadeIn 1.5s ease-out;
        transform: translateY(20px);
    }

    th, td {
        padding: 1rem;
        text-align: left;
        transition: background-color 0.3s;
    }

    th {
        background-color: #0077B6; 
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f1faff; 
    }

    tr:hover {
        background-color: #d1e7f7;
        transform: scale(1.02);
        transition: transform 0.2s ease-in-out;
    }

    td {
        color: #555;
    }

    td:nth-child(3) {
        text-align: right;
    }

    .total-profit {
        font-weight: bold;
        color: #0077B6;
        font-size: 1.8rem;
        margin-top: 20px;
        animation: fadeIn 1s ease-out;
    }

    /* Tombol Kembali */
    .back-btn {
        display: inline-block;
        padding: 12px 25px;
        background-color: #0077B6;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
        text-align: center;
        font-size: 1rem;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Efek hover untuk tombol */
    .back-btn:hover {
        background-color: #005f79;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Efek focus untuk tombol */
    .back-btn:focus {
        outline: none;
        box-shadow: 0 0 5px 2px rgba(0, 123, 255, 0.5);
    }

    /* Animasi untuk fade in */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animasi untuk slide-in dari kiri */
    @keyframes slideFromLeft {
        0% {
            transform: translateX(-30px);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        table {
            width: 100%;
            margin: 1rem;
        }

        h1, h3 {
            font-size: 1.8rem;
        }
    }
    </style>
</head>
<body>
    <h1>Laporan Keuntungan</h1>

    <h3>Data Transaksi</h3>
    <table border="1" class="table-data">
        <thead>
            <tr>
                <th>Nama Item/Layanan</th>
                <th>Tanggal Layanan</th>
                <th>Harga Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $item)
                <tr>
                    <td>{{ $item->order->service->name ?? 'Nama Layanan Tidak Ditemukan' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->order->created_at)->format('d-m-Y') }}</td>
                    <td>Rp. {{ number_format($item->order->total_price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Data Pembelian Operasional</h3>
    <table border="1" class="table-data">
        <thead>
            <tr>
                <th>Nama Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>Harga Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelian as $item)
                <tr>
                    <td>{{ $item->item_name ?? 'Nama Pembelian Tidak Ditemukan' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->purchase_date)->format('d-m-Y') }}</td>
                    <td>Rp. {{ number_format($item->total_price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total Keuntungan: 
        Rp. 
        {{ number_format($totalKeuntungan, 2) }}
    </h3>

    <!-- Tombol Kembali ke Dashboard -->
    <div class="btn-wrapper">
        <a href="{{ route('home.admin') }}" class="back-btn">Kembali ke Halaman Admin</a> <!-- Tombol kembali -->
    </div>

</body>
</html>
