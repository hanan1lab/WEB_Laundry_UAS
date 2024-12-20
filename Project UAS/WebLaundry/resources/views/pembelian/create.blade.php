<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembelian</title>
    <script>
        function calculateTotal() {
            const amount = parseFloat(document.getElementById('amount').value) || 0;
            const quantity = parseInt(document.getElementById('quantity').value) || 0;
            const total = amount * quantity;
            document.getElementById('total_price').value = total.toFixed(2); // Format ke 2 angka desimal
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #e0f7fa; /* Latar belakang biru muda */
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 2rem;
            color: #007BFF;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            opacity: 0;
            animation: fadeInUp 0.5s ease-out forwards;
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

        label {
            font-size: 1.1rem;
            color: black;
            display: block;
            margin-bottom: 0.5rem;
            text-align: left;
        }

        input, select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        input:focus, select:focus, button:focus {
            border-color: #007BFF;
            outline: none;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            padding: 12px;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .back-btn {
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            padding: 12px;
            transition: background-color 0.3s ease;
            margin: 0 auto; /* Menjaga tombol tetap terpusat */
            display: inline-block;
        }

        .back-btn:hover {
            background-color: #757575;
        }

        /* Media Query untuk Responsivitas */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            .form-container {
                padding: 20px;
            }

            input, select, button {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <h1>Tambah Pembelian</h1>

    <div class="form-container">
        <form action="{{ route('pembelian.store') }}" method="POST">
            @csrf

            <div>
                <label for="item_name">Nama Item:</label>
                <input type="text" name="item_name" id="item_name" required>
            </div>

            <div>
                <label for="amount">Harga Satuan:</label>
                <input type="number" name="amount" id="amount" step="0.01" min="0" required oninput="calculateTotal()">
            </div>

            <div>
                <label for="quantity">Kuantitas:</label>
                <input type="number" name="quantity" id="quantity" min="1" required oninput="calculateTotal()">
            </div>

            <div>
                <label for="total_price">Total Harga:</label>
                <input type="text" id="total_price" name="total_price" readonly>
            </div>

            <div>
                <label for="purchase_date">Tanggal Pembelian:</label>
                <input type="date" name="purchase_date" id="purchase_date" required>
            </div>

            <button type="submit">Simpan</button>
        </form>

        <div class="back-btn-container">
            <a href="{{ route('pembelian.index') }}"><button type="button" class="back-btn">Kembali</button></a>
        </div>
    </div>

</body>
</html>
