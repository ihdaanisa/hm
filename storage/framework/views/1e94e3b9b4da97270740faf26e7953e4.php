<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/homeuser.css')); ?>">
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
<div class="container mt-5">
    <h2>Update Profile</h2>
    
    <?php if(session('status')): ?>
        <div class="alert alert-success"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <!-- Name and Email Fields -->
    <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" required>
    <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required>
    
    <div class="form-group mt-3">
    <label for="profile_picture">Profile Picture</label>
    <input type="file" name="profile_picture" id="profile_picture" class="form-control-file" accept="image/*" onchange="previewImage(event)">
    <!-- Preview Image -->
    <img id="profile-picture-preview" src="<?php echo e($user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.png')); ?>" alt="Profile Picture Preview" class="mt-3" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
</div>
    

        <!-- Name Field -->
        <div class="form-group mt-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name', $user->name)); ?>" required>
        </div>

        <!-- Email Field -->
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email', $user->email)); ?>" required>
        </div>

        <!-- Password Fields -->
        <div class="form-group mt-3">
            <label for="password">New Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank if not changing">
        </div>
        <div class="form-group mt-3">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
    </form>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\hackhthin2\resources\views/profile/show.blade.php ENDPATH**/ ?>