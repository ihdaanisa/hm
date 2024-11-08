<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homeuser.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
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

        .btn-outline-light, .btn-light {
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar -->
</header><header class="navbar-custom">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;">
            </a>
            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links and Profile Dropdown -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav me-3">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tentangKami') }}">Tentang Kami</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan') }}">Laporan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dataLaporan') }}">Data Laporan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
    </li>
</ul>
       
                <!-- Profile Dropdown -->
                <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-profile.png') }}" alt="Profile" class="rounded-circle me-2" width="40" height="40">
        <span>{{ Auth::user()->name ?? 'User' }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Edit Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
        </li>
    </ul>
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
