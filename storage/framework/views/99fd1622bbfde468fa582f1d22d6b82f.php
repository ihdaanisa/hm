<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Pak - Professional Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/style.css')); ?>">

    <style>
        .attachment-thumbnail {
        width: 100%;
        max-width: 150px;
        height: auto;
        border-radius: 5px;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .attachment-thumbnail:hover {
        transform: scale(1.05);
    }

    /* Video adjustments for better responsiveness */
    video.attachment-thumbnail {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    /* Ensuring the table is responsive */
    .table {
        width: 100%;
        overflow-x: auto;
        display: block;
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
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="active"><i class="icon">&#128200;</i> Dashboard</a>
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

<div class="container">
    <h1>All User Reports</h1>

    <!-- Display the table with all reports -->
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Title</th>
                <th>Classification</th>
                <th>Status</th>
                <th>Response</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($report->user->name); ?></td>
                    <td><?php echo e($report->title); ?></td>
                    <td><?php echo e($report->classification); ?></td>
                    <td>
    <?php if($report->attachment_path): ?>
        <?php if(preg_match('/\.(jpg|jpeg|png)$/i', $report->attachment_path)): ?>
            <!-- Image Preview -->
            <a href="<?php echo e(asset('storage/' . $report->attachment_path)); ?>" target="_blank">
                <img src="<?php echo e(asset('storage/' . $report->attachment_path)); ?>" class="attachment-thumbnail" alt="Attachment">
            </a>
        <?php elseif(preg_match('/\.(mp4|avi)$/i', $report->attachment_path)): ?>
            <!-- Video Preview -->
            <video controls class="attachment-thumbnail">
                <source src="<?php echo e(asset('storage/' . $report->attachment_path)); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        <?php else: ?>
            <!-- Downloadable File -->
            <a href="<?php echo e(asset('storage/' . $report->attachment_path)); ?>" target="_blank">Lihat Lampiran</a>
        <?php endif; ?>
    <?php else: ?>
        Tidak Ada
    <?php endif; ?>
</td>
                    <!-- Editable status field -->
                    <td>
                        <form action="<?php echo e(route('reports.update', $report->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <select name="status" onchange="this.form.submit()" required>
                                <option value="pending" <?php echo e($report->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="approved" <?php echo e($report->status == 'approved' ? 'selected' : ''); ?>>Approved</option>
                                <option value="rejected" <?php echo e($report->status == 'rejected' ? 'selected' : ''); ?>>Rejected</option>
                            </select>
                        </form>
                    </td>

                    <!-- Editable response field -->
                    <td>
                        <form action="<?php echo e(route('reports.update', $report->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <textarea name="response" rows="2" style="width: 100%;" placeholder="Enter response..."><?php echo e($report->response); ?></textarea>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </td>

                    <td>
                        <form action="<?php echo e(route('reports.destroy', $report->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\hackhthin2\resources\views/admin/reports/index.blade.php ENDPATH**/ ?>