<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Aspirasi Pengaduan Online Masyarakat</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/homeuser.css')); ?>">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #004085;
            color: white;
        }

        .navbar-custom {
            background-color: #003366;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
        }

        .btn-outline-light, .btn-light {
            font-weight: bold;
        }

        .form-container {
            background-color: #003366;
            padding: 20px;
            border-radius: 8px;
            color: white;
            max-width: 600px;
            margin: 20px auto;
        }

        footer {
            background-color: #003366;
            padding: 20px;
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
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" style="height: 40px;">
            </a>
            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links and Profile Dropdown -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav me-3">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('user.dashboard')); ?>">Tentang Kami</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('laporan')); ?>">Laporan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('dataLaporan')); ?>">Data Laporan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('kontak')); ?>">Kontak</a>
    </li>
</ul>
       
                <!-- Profile Dropdown -->
                <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?php echo e(Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-profile.png')); ?>" alt="Profile" class="rounded-circle me-2" width="40" height="40">
        <span><?php echo e(Auth::user()->name ?? 'User'); ?></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
        <li><a class="dropdown-item" href="<?php echo e(route('profile.show')); ?>">Edit Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
        </li>
    </ul>
</div>
        </nav>
    </div>
</header>

<!-- Main Content -->
<div class="form-container">
    <form action="<?php echo e(route('reports.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <label>Pilih Klasifikasi Laporan</label><br>
            <input type="radio" name="classification" value="PENGADUAN" required> Pengaduan
            <input type="radio" name="classification" value="ASPIRASI"> Aspirasi
            <input type="radio" name="classification" value="PERMINTAAN INFORMASI"> Permintaan Informasi
        </div>
        <div class="form-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="Ketik Judul Laporan Anda" required>
        </div>
        <div class="form-group mb-3">
            <textarea name="content" class="form-control" placeholder="Ketik Isi Laporan Anda" required></textarea>
        </div>
        <div class="form-group mb-3">
            <input type="date" name="event_date" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <input type="text" name="location" class="form-control" placeholder="Lokasi Kejadian" required>
        </div>
        <div class="form-group mb-3">
            <input type="text" name="institution" class="form-control" placeholder="Instansi Tujuan" required>
        </div>
        <div class="form-group mb-3">
            <label>Lampirkan File</label>
            <input type="file" name="attachment" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>

<!-- Footer -->
<footer class="footer py-4 text-white">
        <div class="container">
            <div class="row">
                <!-- Logo and Newsletter Subscription -->
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3 font-weight-bold">INTcash</h5>
                    <p>Ikuti berita terbaru dari kami</p>
                    <form class="d-flex">
                        <input type="email" class="form-control mr-2" placeholder="Email">
                        <button class="btn btn-light">➤</button>
                    </form>
                </div>
                <!-- Footer Links -->
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
                <!-- Social Media Links -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\hackhthin2\resources\views/user/laporan.blade.php ENDPATH**/ ?>