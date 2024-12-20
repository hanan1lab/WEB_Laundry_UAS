<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Laundry Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #007bff;
            padding: 20px;
            color: white;
            text-align: center;
        }
        nav {
            margin: 10px 0;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 18px;
        }
        .jumbotron {
            padding: 50px;
            background-color: #007bff;
            color: white;
            text-align: center;
        }
        .jumbotron h1 {
            font-size: 50px;
            margin-bottom: 20px;
        }
        .jumbotron p {
            font-size: 20px;
        }
        .btn-primary {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
        }
        .container {
            padding: 20px;
        }
        .row {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
        }
        .card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 30%;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .card h5 {
            font-size: 24px;
            margin-bottom: 15px;
        }
        .card p {
            font-size: 16px;
            color: #555;
        }
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            position: absolute;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>Laundry Web</h1>
        <nav>
            <a href="home">Home</a>
            <a href="Order">Order</a>
        </nav>
    </header>

    <!-- Services Section -->
    <div class="container">
        <div class="row">
            <div class="card">
                <h5>Laundry Kiloan</h5>
                <p>Harga hemat untuk pencucian pakaian sehari-hari Anda.</p>
            </div>
            <div class="card">
                <h5>Laundry Satuan</h5>
                <p>Pencucian pakaian per satuan untuk pakaian spesial.</p>
            </div>
            <div class="card">
                <h5>Dry Cleaning</h5>
                <p>Layanan dry cleaning untuk pakaian yang memerlukan perawatan ekstra.</p>
            </div>
            <div class="card">
                <h5>Cuci & Setrika</h5>
                <p>Layanan dry cleaning untuk pakaian yang memerlukan perawatan ekstra.</p>
            </div>
        </div>
    </div>
    <!-- Jumbotron Section -->
    <div class="jumbotron">
        <h1>Selamat Datang di Laundry Kami</h1>
        <p>Layanan Laundry Cepat, Murah, dan Berkualitas untuk Anda</p>
        <a class="btn-primary" href="#">Lihat Layanan Kami</a>
    </div>

    <!-- Footer Section -->
    <footer>
        © 2024 Laundry Web. All rights reserved.
    </footer>

</body>
</html>