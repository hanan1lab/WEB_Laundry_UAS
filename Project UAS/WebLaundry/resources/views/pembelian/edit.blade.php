<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembelian</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #eef6fc; /* Latar belakang biru muda */
            color: #333;
            text-align: center;
            padding: 40px;
        }

        h1 {
            font-size: 2rem;
            color: #0077B6; /* Warna biru */
            margin-bottom: 20px;
        }

        form {
            background-color: white;
            width: 90%;
            max-width: 500px;
            margin: 0 auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 1.1rem;
        }

        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="number"]:focus, input[type="date"]:focus {
            border-color: #0077B6;
            outline: none;
        }

        button {
            background-color: #0077B6;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%; /* Lebar tombol penuh */
        }

        button:hover {
            background-color: #005f87;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .back-btn, .update-btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 1.1rem;
            cursor: pointer;
            text-decoration: none;
            width: 48%; /* Lebar tombol 48% dari container */
            color: white;
            text-align: center;
        }

        .back-btn {
            background-color: #9e9e9e;
        }

        .back-btn:hover {
            background-color: #757575;
        }

        .update-btn {
            background-color: #0077B6;
        }

        .update-btn:hover {
            background-color: #005f87;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                width: 100%;
                padding: 15px;
            }

            h1 {
                font-size: 1.5rem;
            }

            .button-container {
                flex-direction: column;
                align-items: center;
            }

            .back-btn, .update-btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
    <script>
        function calculateTotal() {
            const amount = parseFloat(document.getElementById('amount').value) || 0;
            const quantity = parseInt(document.getElementById('quantity').value) || 0;
            const total = amount * quantity;
            document.getElementById('total_price').value = total.toFixed(2); // Format ke 2 angka desimal
        }
    </script>
</head>
<body>

    <h1>Edit Pembelian</h1>

    <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="item_name">Nama Item:</label>
            <input type="text" name="item_name" id="item_name" value="{{ old('item_name', $pembelian->item_name) }}" required>
        </div>

        <div>
            <label for="amount">Harga Satuan:</label>
            <input type="number" name="amount" id="amount" step="0.01" min="0" value="{{ old('amount', $pembelian->amount) }}" required oninput="calculateTotal()">
        </div>

        <div>
            <label for="quantity">Kuantitas:</label>
            <input type="number" name="quantity" id="quantity" min="1" value="{{ old('quantity', $pembelian->quantity) }}" required oninput="calculateTotal()">
        </div>

        <div>
            <label for="total_price">Total Harga:</label>
            <input type="text" id="total_price" name="total_price" value="{{ old('total_price', $pembelian->total_price) }}" readonly>
        </div>

        <div>
            <label for="purchase_date">Tanggal Pembelian:</label>
            <input type="date" name="purchase_date" id="purchase_date" value="{{ old('purchase_date', $pembelian->purchase_date) }}" required>
        </div>

        <button type="submit" class="update-btn">Update Pembelian</button>

        <p> </p>
        
        <a href="{{ route('pembelian.index') }}" class="back-btn">Kembali ke Daftar Pembelian</a>

        <!-- Container Tombol Kembali dan Update Pembelian -->
        <div class="button-container">
        </div>

    </form>

</body>
</html>
