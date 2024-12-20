<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Detail Layanan</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #C8E6F5;
            color: #333;
            text-align: center;
            animation: fadeIn 1.5s ease-out;
        }

        h1 {
            font-size: 2.5rem;
            color: #000; 
            margin: 2rem 0;
            animation: slideFromLeft 1s ease-out;
        }

        .content-box {
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
            justify-content: space-between;
        }

        p {
            font-size: 1.2rem;
            color: #555;
            margin: 1rem 0;
        }

        strong {
            color: #0077B6;
        }

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
            width: 100%;
            box-sizing: border-box;
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
            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            .content-box {
                width: 90%;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <h1>Detail Layanan</h1>

    <!-- Box putih untuk menampilkan detail layanan -->
    <div class="content-box">
        <p><strong>Nama Layanan :</strong> {{ $service->name }}</p>
        <p><strong>Harga per Kg/Satuan :</strong> Rp. {{ number_format($service->price_per_kg, 2) }}</p>

        <!-- Tombol kembali di dalam box -->
        <a href="{{ route('services.index') }}" class="back-btn">Kembali ke Daftar Layanan</a>
    </div>

</body>
</html>
