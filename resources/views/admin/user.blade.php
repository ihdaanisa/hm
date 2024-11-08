<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User - Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahan CSS untuk mengatur penempatan tabel di sebelah kiri */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-left: 20px; /* Tambahkan margin kiri agar tabel tidak terlalu dekat dengan tepi */
            width: 70%; /* Tentukan lebar kontainer tabel */
        }

        /* Styling header tabel */
        table.table-bordered th {
            background-color: #1a3c87;
            color: white;
        }

        /* Styling border tabel */
        table.table-bordered td {
            border-color: #dee2e6;
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
                <a href="{{ route('admin') }}"><i class="icon">🏠</i> Dashboard</a>
                <a href="laporan.html"><i class="icon">📄</i> Reports</a>
                <a href="{{ route('admin.user') }}" class="active"><i class="icon">👤</i> Users</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <div class="header-left">
                    <h1>Users Dashboard</h1>
                    <p class="date">Wednesday, November 6, 2024</p>
                </div>
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

            <!-- Content Wrapper untuk Penempatan Tabel di Sebelah Kiri -->
            <main class="content-wrapper">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>List User</h2>
                </div>

                <!-- Tombol Create User -->
                <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Create User</button>

                <!-- Tabel User -->
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $item->id }}">Edit</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal Create User -->
                <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title" id="modalCreateLabel">Create User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Update User -->
                @foreach ($users as $item)
                <div class="modal fade" id="modalUpdate{{ $item->id }}" tabindex="-1" aria-labelledby="modalUpdateLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="modalUpdateLabel{{ $item->id }}">Update User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('users.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" value="{{ $item->name }}" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="{{ $item->email }}" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Modal Delete User -->
                @foreach ($users as $item)
                <div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="modalDeleteLabel{{ $item->id }}">Delete User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete <strong>{{ $item->name }}</strong>?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </main>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
