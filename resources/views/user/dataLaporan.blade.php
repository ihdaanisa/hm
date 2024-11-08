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
        <a class="nav-link" href="{{ route('user.dashboard') }}">Tentang Kami</a>
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
            @forelse ($reports as $report)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $report->title }}</td>
                    <td>{{ $report->classification }}</td>
                    <td>{{ Str::limit($report->content, 50) }}</td>
                    <td>{{ $report->event_date }}</td>
                    <td>{{ $report->location }}</td>
                    <td>{{ $report->institution }}</td>
                    <td>
    @if ($report->attachment_path)
        @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $report->attachment_path))
            <img src="{{ asset('storage/' . $report->attachment_path) }}" class="attachment-thumbnail" alt="Attachment">
        @elseif (preg_match('/\.(mp4|avi)$/i', $report->attachment_path))
            <video width="100" controls>
                <source src="{{ asset('storage/' . $report->attachment_path) }}" type="video/{{ pathinfo($report->attachment_path, PATHINFO_EXTENSION) }}">
                Your browser does not support the video tag.
            </video>
        @else
            <a href="{{ asset('storage/' . $report->attachment_path) }}" target="_blank">Download File</a>
        @endif
    @else
        Tidak Ada
    @endif
</td>


                    <td>{{ $report->status }}</td>
                    <td>{{ $report->response ?? 'Belum ada tanggapan' }}</td>
                    <td>
                        @can('admin')
                            <a href="{{ route('admin.reports.edit', $report->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center">Tidak ada laporan tersedia.</td>
                </tr>
            @endforelse
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
