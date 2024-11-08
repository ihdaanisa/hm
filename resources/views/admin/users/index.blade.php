
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
        .btn {
        color: #000000; /* Black text color */
        padding: 0.5rem 1rem;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #000000; /* Black background color for "Add New User" */
        color: #ffffff;
        text-decoration: none;
        border-radius: 4px;
    }

    .btn-primary:hover {
        background-color: #333333; /* Darker shade on hover */
    }

    .btn-warning {
        background-color: #ffc107;
        color: #000000; /* Black text color */
        border-radius: 4px;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #000000; /* Black text color */
        border-radius: 4px;
    }

    .btn-danger:hover {
        background-color: #c82333;
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
<div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Lapor Pak</h2>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="active"><i class="icon">&#128200;</i> Dashboard</a>
                <a href="/laporan.html"><i class="icon">&#128221;</i> Reports</a>
                <a href="{{ route('users.index') }}"><i class="icon">👤</i> Users</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <div class="header-left">
                    <h1>User</h1>
                    <span class="date">Wednesday, November 6, 2024</span>
                </div>
                <!-- Enhanced Profile Section with Dropdown -->
                <div class="profile-section">
                    <!-- Profile Info -->
                    <div class="profile-info">
                        <span class="name">{{ Auth::user()->name }}</span>
                        <span class="role">{{ Auth::user()->role ? 'Admin' : 'User' }}</span>


                    </div>
                    <div class="dropdown">
                        <button class="dropdown-toggle" onclick="toggleDropdown()">
                            <img src="{{ asset('images/image 113.png') }}" alt="Profile">
                        </button>
                        <ul class="dropdown-menu" id="profileDropdown">
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

        <!-- Main Content -->
        <div class="main-content">
            <!-- Content goes here -->
            <h1>User Management</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

        </div>
    </div>

</body>
</html>

   