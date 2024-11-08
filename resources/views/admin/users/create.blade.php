
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Pak - Professional Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <style>
        /* Custom Navbar */
        .navbar-custom {
            background-color: #003366;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 1rem;
            color: #ffffff;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: #ffffff;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar-nav {
            display: flex;
            gap: 1rem;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: #d1e7ff;
        }

        .profile-section {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-toggle {
            position: relative;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            overflow: hidden;
            background: linear-gradient(45deg, #0056b3, #00aaff);
        }

        .dropdown-toggle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 55px;
            right: 0;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            z-index: 1;
            overflow: hidden;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            display: block;
            transition: background-color 0.2s;
        }

        .dropdown-item:hover {
            background-color: #e0e0e0;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            color: #fff;
        }

        .profile-info .name {
            font-weight: bold;
            color: #ffffff;
        }

        .profile-info .role {
            font-size: 0.9em;
            color: #a0d7ff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header class="navbar-custom">
        <a href="/" class="navbar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <span>Lapor Pak</span>
        </a>
        <nav class="navbar-nav">
            <a href="/" class="nav-link">Home</a>
            <a href="/reports" class="nav-link">Reports</a>
            <a href="/settings" class="nav-link">Settings</a>
        </nav>
        <!-- Profile Section with Dropdown -->
        <div class="profile-section">
            <div class="profile-info">
                <span class="name">{{ Auth::user()->name }}</span>
                <span class="role">{{ Auth::user()->role }}</span>
            </div>
            <div class="dropdown">
                <button class="dropdown-toggle">
                    <img src="{{ asset('images/image 113.png') }}" alt="Profile">
                </button>
                <ul class="dropdown-menu">
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
        </div>
    </header>

    <!-- Sidebar & Main Content -->
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Lapor Pak</h2>
            <nav>
                <a href="admin.dashboard" class="active"><i class="icon">&#128200;</i> Dashboard</a>
                <a href="reports.index"><i class="icon">&#128221;</i> Reports</a>
                <a href="{{ route('users.index') }}"><i class="icon">👤</i> Users</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Content goes here -->
            <h1>Add New User</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="role">Role:</label>
        <select name="role" id="role" class="form-control" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="perusahaan">Perusahaan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Create User</button>
</form>

        </div>
    </div>

</body>
</html>

  
