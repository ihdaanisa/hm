<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            height: 30px;
            margin-right: 10px;
        }
        .navbar-nav .nav-link {
            color: #ffffff !important;
        }
        .btn-outline-light, .btn-light {
            font-weight: bold;
        }
        /* Custom table styling */
        .table-container {
            margin-top: 20px;
        }
        .table {
            background-color: white;
            font-size: 0.9rem;
            color: #333; /* Dark font color for table text */
        }
        .table th {
            background-color: #003366;
            color: #fff;
            text-align: center;
            font-size: 0.8rem;
        }
        .table td {
            text-align: center;
            vertical-align: middle;
            font-size: 0.8rem;
            color: #333;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table .btn {
            font-size: 10px;
            padding: 4px 8px;
        }
        .attachment-thumbnail {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<header class="navbar-custom">
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


<!-- Data Laporan Se ction -->
<div class="container table-container">
    <h2 class="text-center mb-4">Data Laporan</h2>

    <!-- Table to display report data -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Klasifikasi</th>
                <th>Isi Laporan</th>
                <th>Tanggal Kejadian</th>
                <th>Lokasi</th>
                <th>Instansi</th>
                <th>Lampiran</th>
                <th>Status</th>
                <th>Response</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($report->title); ?></td>
                    <td><?php echo e($report->classification); ?></td>
                    <td><?php echo e(Str::limit($report->content, 50)); ?></td>
                    <td><?php echo e($report->event_date); ?></td>
                    <td><?php echo e($report->location); ?></td>
                    <td><?php echo e($report->institution); ?></td>
                    <td>
    <?php if($report->attachment_path): ?>
        <?php if(preg_match('/\.(jpg|jpeg|png|gif)$/i', $report->attachment_path)): ?>
            <img src="<?php echo e(asset('storage/' . $report->attachment_path)); ?>" class="attachment-thumbnail" alt="Attachment">
        <?php elseif(preg_match('/\.(mp4|avi)$/i', $report->attachment_path)): ?>
            <video width="100" controls>
                <source src="<?php echo e(asset('storage/' . $report->attachment_path)); ?>" type="video/<?php echo e(pathinfo($report->attachment_path, PATHINFO_EXTENSION)); ?>">
                Your browser does not support the video tag.
            </video>
        <?php else: ?>
            <a href="<?php echo e(asset('storage/' . $report->attachment_path)); ?>" target="_blank">Download File</a>
        <?php endif; ?>
    <?php else: ?>
        Tidak Ada
    <?php endif; ?>
</td>


                    <td><?php echo e($report->status); ?></td>
                    <td><?php echo e($report->response ?? 'Belum ada tanggapan'); ?></td>
                    <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                            <a href="<?php echo e(route('admin.reports.edit', $report->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="11" class="text-center">Tidak ada laporan tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script>
    // Preview image before uploading
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const preview = document.getElementById('profile-picture-preview');
            preview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\hackhthin2\resources\views/user/dataLaporan.blade.php ENDPATH**/ ?>