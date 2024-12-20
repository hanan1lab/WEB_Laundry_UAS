<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>

    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef6fc;
            color: #333;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            color: #0077B6;
            margin: 2rem 0;
        }

        form {
            width: 80%;
            margin: 0 auto;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #555;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        button {
            background-color: #0077B6;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #005f86;
        }

        a {
            text-decoration: none;
            color: #0077B6;
            font-size: 1rem;
            margin-top: 1rem;
            display: inline-block;
        }

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
            background-color: #FFAA00;
        }

        .status-Proses {
            background-color: #0077B6;
        }

        .status-Selesai {
            background-color: #28A745;
        }

        .status-Dibatalkan {
            background-color: #FF0000;
        }
    </style>

    <script>
        // Fungsi untuk menghitung total harga
        function calculateTotalPrice() {
            // Dapatkan elemen layanan, berat, dan total harga
            const serviceSelect = document.getElementById('service');
            const weightInput = document.getElementById('weight');
            const totalPriceInput = document.getElementById('total_price');

            // Ambil harga per kg dari opsi layanan yang dipilih
            const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
            const pricePerKg = parseFloat(selectedOption.dataset.price);

            // Ambil berat
            const weight = parseFloat(weightInput.value);

            // Hitung total harga jika input valid
            if (!isNaN(pricePerKg) && !isNaN(weight)) {
                const totalPrice = pricePerKg * weight;
                totalPriceInput.value = totalPrice.toFixed(2); // Format menjadi dua desimal
            } else {
                totalPriceInput.value = ''; // Kosongkan jika input tidak valid
            }
        }

        // Tambahkan event listener
        document.addEventListener('DOMContentLoaded', () => {
            const serviceSelect = document.getElementById('service');
            const weightInput = document.getElementById('weight');

            // Perbarui total harga saat layanan atau berat berubah
            serviceSelect.addEventListener('change', calculateTotalPrice);
            weightInput.addEventListener('input', calculateTotalPrice);

            // Hitung total harga saat halaman dimuat pertama kali
            calculateTotalPrice();
        });
    </script>
</head>
<body>

    <h1>Edit Pesanan</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="customer_name">Nama Pelanggan</label>
        <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" required>

        <label for="address">Alamat</label>
        <textarea id="address" name="address" required>{{ old('address', $order->address) }}</textarea>

        <label for="phone">Nomor HP</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', $order->phone) }}" required>

        <label for="service">Layanan</label>
        <select id="service" name="service_id" required>
            @foreach($services as $service)
                <!-- Tambahkan data-price untuk menyimpan harga per kg -->
                <option value="{{ $service->id }}" data-price="{{ $service->price_per_kg }}" {{ $order->service_id == $service->id ? 'selected' : '' }}>
                    {{ $service->name }}
                </option>
            @endforeach
        </select>

        <label for="weight">Berat (kg)</label>
        <input type="number" id="weight" name="weight" value="{{ old('weight', $order->weight) }}" step="0.1" required>

        <label for="total_price">Total Harga</label>
        <input type="number" id="total_price" name="total_price" value="{{ old('total_price', $order->total_price) }}" step="0.01" readonly>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="{{ route('order.index') }}">Kembali ke Daftar Pesanan</a>

</body>
</html>
