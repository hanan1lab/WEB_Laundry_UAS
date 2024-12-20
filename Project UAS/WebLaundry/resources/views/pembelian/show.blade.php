<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian</title>
    <style>
        /* Resetting basic styles */
        body, h1, p, label {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif; /* Simple font */
        }

        /* Body styling */
        body {
            background-color: #f8f9fa;
            color: #333;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #0077B6;
            font-size: 2rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            animation: fadeIn 1s ease-in-out;
            font-weight: normal; /* Remove bold effect */
        }

        /* Card container */
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
            padding: 25px;
            animation: slideUp 0.8s ease-out;
        }

        /* Card label styling */
        label {
            font-size: 1rem;
            color: #0077B6;
            display: block; /* Ensure labels are block-level for spacing */
            margin-bottom: 8px; /* Space between label and content */
            font-weight: normal; /* No bold for labels */
        }

        /* Paragraph styling for details */
        p {
            font-size: 1rem;
            color: #555;
            margin-top: 5px;
            margin-bottom: 18px; /* Space between paragraph items */
            font-weight: normal; /* No bold for the content */
        }

        /* Back link button */
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 25px;
            background-color: #ec971f;
            color: white;
            border-radius: 6px;
            font-size: 1rem;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .back-link:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }

        /* Animation for fading in the title */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Animation for sliding up the card */
        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <h1>Detail Pembelian</h1>

    <div class="card">
        <div>
            <label for="item_name">Nama Item:</label>
            <p>{{ $pembelian->item_name }}</p>
        </div>

        <div>
            <label for="amount">Harga Satuan:</label>
            <p>{{ number_format($pembelian->amount, 2, ',', '.') }}</p>
        </div>

        <div>
            <label for="quantity">Kuantitas:</label>
            <p>{{ $pembelian->quantity }}</p>
        </div>

        <div>
            <label for="total_price">Total Harga:</label>
            <p>{{ number_format($pembelian->total_price, 2, ',', '.') }}</p>
        </div>

        <div>
            <label for="purchase_date">Tanggal Pembelian:</label>
            <p>{{ \Carbon\Carbon::parse($pembelian->purchase_date)->format('d/m/Y') }}</p>
        </div>

        <a href="{{ route('pembelian.index') }}" class="back-link">Kembali ke Daftar Pembelian</a>
    </div>

</body>
</html>
