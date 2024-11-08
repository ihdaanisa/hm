<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Layanan Aspirasi Pengaduan Online Masyarakat</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homeuser.css') }}">
    <style>
        /* Basic Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #004085;
            color: white;
        }

        .navbar-custom {
            background-color: #003366;
            padding: 0.5rem 1rem;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
        }

        .navbar-nav .nav-link:hover {
            color: #d1e7ff !important;
        }

        .contact-section {
            background-color: #f8f9fa;
            color: #333;
            padding: 50px 0;
        }

        .btn-outline-light, .btn-light {
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<header class="navbar-custom">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav me-3">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('welcome') }}">Tentang Kami</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">Data Laporan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kontakhome') }}">Kontak</a>
    </li>
</ul>
                <a href="{{ route('login') }}" class="btn btn-outline-light" style="margin-right: 10px;">Masuk</a>  
                <a href="{{ route('register') }}" class="btn btn-light" style="margin-left: 10px;">Daftar</a>
            </div>
        </nav>
    </div>
</header>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <h2 class="text-center font-weight-bold mb-4">Hubungi Kami</h2>
        <p class="text-center mb-5">Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami melalui formulir di bawah ini.</p>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    <div class="form-group mb-3">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap Anda">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Pesan</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Tuliskan pesan Anda di sini"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer py-4 text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="mb-3 font-weight-bold">INTcash</h5>
                <p>Ikuti berita terbaru dari kami</p>
                <form class="d-flex">
                    <input type="email" class="form-control mr-2" placeholder="Email">
                    <button class="btn btn-light">➤</button>
                </form>
            </div>
            <div class="col-md-2 mb-4">
                <h5 class="mb-3 font-weight-bold">About</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white-50">Our Story</a></li>
                    <li><a href="#" class="text-white-50">Benefits</a></li>
                    <li><a href="#" class="text-white-50">Team</a></li>
                    <li><a href="#" class="text-white-50">Careers</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-4">
                <h5 class="mb-3 font-weight-bold">Help</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white-50">FAQs</a></li>
                    <li><a href="#" class="text-white-50">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4 d-flex justify-content-center align-items-center">
                <a href="#" class="text-white-50 mx-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white-50 mx-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white-50 mx-2"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="row text-center mt-3">
            <div class="col-md-12">
                <p class="text-white-50">© 2024 LaporPak. All rights reserved.</p>
                <a href="#" class="text-white-50 mx-2">Terms & Conditions</a>
                <a href="#" class="text-white-50 mx-2">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
