<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ubah Layanan</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
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

        .form-container {
            background-color: white;
            padding: 2rem;
            margin: 0 auto;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            animation: fadeIn 1s ease-out;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 1.1rem;
            color: #555;
            text-align: left;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            font-size: 1.1rem;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #0077B6;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            padding: 12px 20px;
            background-color: #0077B6;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: #005f79;
            transform: scale(1.05);
        }

        .back-btn {
            text-decoration: none;
            color: #0077B6;
            font-size: 1rem;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            color: #005f79;
            transform: scale(1.05);
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
            h1 {
                font-size: 2rem;
            }

            .form-container {
                width: 90%;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <h1>Ubah Layanan</h1>

    <!-- Form untuk mengubah layanan -->
    <div class="form-container">
        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nama Layanan :</label>
            <input type="text" name="name" id="name" value="{{ $service->name }}" required>

            <label for="price_per_kg">Harga per Kg/Satuan :</label>
            <input type="number" name="price_per_kg" id="price_per_kg" value="{{ $service->price_per_kg }}" required>

            <button type="submit">Update Layanan</button>
        </form>

        <!-- Tombol kembali ke daftar layanan -->
        <a href="{{ route('services.index') }}" class="back-btn">Kembali ke Daftar Layanan</a>
    </div>

</body>
</html>
