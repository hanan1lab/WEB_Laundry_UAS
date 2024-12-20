<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Terhapus</title>
    <style>
        /* Gaya umum */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            color:rgb(9, 10, 9);
            margin-top: 20px;
        }

        /* Gaya tombol */
        .btn {
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color:rgb(61, 151, 241);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #e53935;
        }

        /* Gaya tabel */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color:rgb(107, 178, 222);
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Tombol kembali */
        .back-btn-container {
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1>Data Terhapus</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Item</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trashed as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->item_name }}</td>
                <td>
                    <form action="{{ route('pembelian.restore', $data->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH') <!-- Menggunakan PATCH sesuai rute -->
                        <button type="submit" class="btn">Pulihkan</button>
                    </form>
                    <form action="{{ route('pembelian.forceDelete', $data->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE') <!-- Menggunakan DELETE sesuai rute -->
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini secara permanen?')">Hapus Permanen</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tombol kembali -->
    <div class="back-btn-container">
        <a href="{{ route('pembelian.index') }}" class="btn">Kembali ke Halaman Pembelian</a>
    </div>
</body>
</html>
