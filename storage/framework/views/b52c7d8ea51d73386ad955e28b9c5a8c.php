<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Pak - Professional Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/style.css')); ?>">

    <style>
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

        /* Styling Profile Section with Enhanced Look */
        .profile-section {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        .profile-section .dropdown {
            position: relative;
            display: inline-block;
        }

        .profile-section .dropdown-toggle {
            position: relative;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid transparent;
            background: linear-gradient(45deg, #0056b3, #00aaff);
            padding: 2px;
            transition: transform 0.3s ease-in-out;
        }

        /* Adding Profile Image Styles */
        .profile-section .dropdown-toggle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            transition: opacity 0.3s ease;
        }

        /* Hover Effect on Profile Picture */
        .profile-section .dropdown-toggle:hover {
            transform: scale(1.1);
        }

        .profile-section .dropdown-toggle img:hover {
            opacity: 0.9;
        }

        /* Dropdown Styling */
        .profile-section .dropdown-menu {
            display: none;
            position: absolute;
            top: 70px;
            right: 0;
            background-color: #fff;
            min-width: 180px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            z-index: 1;
            overflow: hidden;
        }

        .profile-section .dropdown-item {
            padding: 12px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .profile-section .dropdown-item:hover {
            background-color: #e0e0e0;
        }

        /* Profile Info Display */
        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            color: #fff;
        }

        .profile-info .name {
            color: #003366;
            font-weight: bold;
            font-size: 1.1em;
        }

        .profile-info .role {
            font-size: 0.9em;
            color: #00aaff;
        }

        /* Enhanced Hover for Profile Dropdown */
        .profile-section:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body>

    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Lapor Pak</h2>
            <nav>
                <a href="index.html" class="active"><i class="icon">&#128200;</i> Dashboard</a>
                <a href="<?php echo e(route('reports.index')); ?>"><i class="icon">&#128221;</i> Reports</a>
                <a href="<?php echo e(route('users.index')); ?>"><i class="icon">👤</i> Users</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <div class="header-left">
                    <h1>Dashboard</h1>
                    <span class="date">Wednesday, November 6, 2024</span>
                </div>
                <!-- Enhanced Profile Section with Dropdown -->
                <div class="profile-section">
                    <!-- Profile Info -->
                    <div class="profile-info">
                        <span class="name"><?php echo e(Auth::user()->name); ?></span>
                        <span class="role"><?php echo e(Auth::user()->role ? 'Admin' : 'User'); ?></span>


                    </div>
                    <div class="dropdown">
                        <button class="dropdown-toggle" onclick="toggleDropdown()">
                            <img src="<?php echo e(asset('images/image 113.png')); ?>" alt="Profile">
                        </button>
                        <ul class="dropdown-menu" id="profileDropdown">
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
                </div>
            </header>

            <!-- Summary Cards -->
            <section class="summary-cards">
    <div class="card">
        <h3>Total Reports</h3>
        <p><?php echo e($totalReports); ?></p>
    </div>
    <div class="card">
        <h3>Pending Reports</h3>
        <p><?php echo e($pendingReports); ?></p>
    </div>
    <div class="card">
        <h3>Approved Reports</h3>
        <p><?php echo e($approvedReports); ?></p>
    </div>
    <div class="card">
        <h3>Rejected Reports</h3>
        <p><?php echo e($rejectedReports); ?></p>
    </div>
</section>


            <!-- Report Table -->
            <section class="report-table">
                <h2>Recent Reports</h2>
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
                            <?php if(preg_match('/\.(jpg|jpeg|png)$/i', $report->attachment_path)): ?>
                                <img src="<?php echo e(asset('storage/' . $report->attachment_path)); ?>" class="attachment-thumbnail" alt="Attachment">
                            <?php else: ?>
                                <a href="<?php echo e(asset('storage/' . $report->attachment_path)); ?>" target="_blank">Lihat Lampiran</a>
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
            </section>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("profileDropdown");
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }

        // Hide dropdown if user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-toggle img')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === "block") {
                        openDropdown.style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\hackhthin2\resources\views/admin/index.blade.php ENDPATH**/ ?>