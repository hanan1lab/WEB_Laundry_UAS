<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Laundry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ADD8E6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }

        h1 {
            font-size: 1.8rem;
            color: #0077B6;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        input:focus, textarea:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 3px #4CAF50;
        }

        button {
            padding: 10px 15px;
            font-size: 1rem;
            color: #fff;
            background-color: #3CB4C8;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0077B6;
        }

        .back-button {
            display: inline-block;
            background-color: #999;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-size: 1rem;
            width: 100px;
            margin: 0 auto; /* Pusatkan tombol secara horizontal */
        }

        .back-button:hover {
            background-color: #777;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 1.5rem;
            }

            label, input, textarea, select, button, .back-button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Order Laundry</h1>
        <form action="{{ route('order.store') }}" method="POST">
            @csrf

            <!-- Nama Pelanggan -->
            <div>
                <label for="customer_name">Nama Pelanggan:</label>
                <input type="text" id="customer_name" name="customer_name" required>
            </div>

            <!-- Alamat Pelanggan -->
            <div>
                <label for="address">Alamat Pelanggan:</label>
                <textarea id="address" name="address" required></textarea>
            </div>

            <!-- Nomor HP -->
            <div>
                <label for="phone">Nomor HP:</label>
                <input type="text" id="phone" name="phone" required>
            </div>

            <!-- Layanan -->
            <div>
                <label for="service_id">Layanan:</label>
                <select id="service_id" name="service_id" required>
                    <option value="">Pilih Layanan</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">
                            {{ $service->name }} - Rp {{ number_format($service->price_per_kg, 0, ',', '.') }} /kg
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Berat -->
            <div>
                <label for="weight">Jumlah (Kg/Satuan):</label>
                <input type="number" id="weight" name="weight" required>
            </div>

            <!-- Total Harga -->
            <div>
                <label for="total_price">Total Harga:</label>
                <input type="text" id="total_price" readonly>
            </div>

            <!-- Tombol Buat Order -->
            <button type="submit">Buat Order</button>

            <!-- Tombol Kembali -->
            <div style="display: flex; justify-content: center; margin-top: 10px;">
                <a href="{{ route('order.index') }}" class="back-button">Kembali</a>
            </div>
        </form>
    </div>

    <!-- Script Penghitungan Total Harga -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const serviceSelect = document.getElementById('service_id');
            const weightInput = document.getElementById('weight');
            const totalPriceInput = document.getElementById('total_price');

            const services = @json($services);

            function calculateTotalPrice() {
                const selectedService = services.find(service => service.id == serviceSelect.value);
                const weight = parseFloat(weightInput.value) || 0;

                if (selectedService) {
                    const totalPrice = selectedService.price_per_kg * weight;
                    totalPriceInput.value = totalPrice.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                } else {
                    totalPriceInput.value = '';
                }
            }

            serviceSelect.addEventListener('change', calculateTotalPrice);
            weightInput.addEventListener('input', calculateTotalPrice);
        });
    </script>
</body>
</html>
