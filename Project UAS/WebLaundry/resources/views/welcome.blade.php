<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome to Fast Laundry</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Make sure the body takes full height */
            font-family: 'Figtree', sans-serif;
            background-color: #f3f4f6;
            color: #333;
        }

        .header {
            background-color: #4caf50;
            color: white;
            text-align: center;
            padding: 2rem;
        }

        .header h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .header p {
            font-size: 1.2rem;
            margin: 0.5rem 0 0;
        }

        .content {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            flex-grow: 1; /* Allow content to grow and take available space */
        }

        .content h2 {
            font-size: 1.8rem;
            color: #4caf50;
            margin-bottom: 1rem;
        }

        .content p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .cta {
            text-align: center;
            margin-top: 2rem;
        }

        .cta a {
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 4px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .cta a:hover {
            background-color: #45a049;
        }

        footer {
            background-color: rgba(76, 175, 80, 0.9); /* Transparansi agar menyatu dengan background */
            color: white;
            padding: 2rem 1rem;
            text-align: center;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to Fast Laundry</h1>
        <p>Your trusted partner for fast, fresh, and clean clothes!</p>
    </div>

    <div class="content">
        <h2>About Our Services</h2>
        <p>
            Di Fast Laundry Kami Menyediakan Layanan yang sudah tersedia dengan cepat bersih dan Segar.
            Kami siap melayani anda.
            Nikmati pakaian yang segar, bersih, dan terlipat rapi setiap saat.
        </p>
        <p>
        Tim kami yang berdedikasi memastikan bahwa cucian Anda ditangani dengan sangat hati-hati menggunakan deterjen ramah lingkungan dan teknik pembersihan yang canggih.        </p>
        <div class="cta">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
        </div>
    </div>

    <footer>
        <div>
            <p>&copy; {{ date('Y') }} Fast Laundry | All Rights Reserved.</p>
            <p>123 Diponegoro Street, Serayu, Madiun | Phone: (+62) 0382-24580-9779 | Email: fastlaundry@gmail.com</p>
        </div>
    </footer>

    <!-- Tambahan Script -->
    <script>
        window.addEventListener("pageshow", function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            if (localStorage.getItem("scrollPosition")) {
                window.scrollTo(0, localStorage.getItem("scrollPosition"));
            }
            window.addEventListener("beforeunload", function() {
                localStorage.setItem("scrollPosition", window.scrollY);
            });
        });
    </script>
</body>
</html>
