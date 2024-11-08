<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        .left-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .register-form-container h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .register-form-container .form-group label {
            font-weight: bold;
        }

        .register-form-container .btn {
            background-color: #004085;
            color: #ffffff;
            width: 100%;
            margin-top: 20px;
        }

        .register-form-container .text-center {
            margin-top: 15px;
            font-size: 14px;
        }

        .register-form-container .text-center a {
            color: #004085;
            font-weight: bold;
            text-decoration: none;
        }

        .register-form-container .text-center a:hover {
            text-decoration: underline;
        }

        .right-section {
            background-color: #004085; /* Blue background */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .right-section-content {
            text-align: center;
            z-index: 2;
        }

        .right-section-content img {
            max-width: 380px; /* Adjust size as needed */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<div class="row m-0">
    <!-- Left section with registration form -->
    <div class="col-md-6 left-section">
        <div class="register-form-container">
            <h2>Daftar Akun</h2>
            <form action="{{ route('register.perform') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Masukkan nama">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="ihda@gmail.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Masukkan password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password-confirm">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required placeholder="Konfirmasi password">
                </div>

                <button type="submit" class="btn">Daftar</button>
            </form>
            <p class="text-center">Sudah Punya Akun? <a href="{{ route('login') }}">Masuk</a></p>
        </div>
    </div>
    
    <!-- Right section with blue background and centered image -->
    <div class="col-md-6 right-section">
        <div class="right-section-content">
            <img src="images/hero-bg 1.png" alt="Small Image"> <!-- Replace 'hero-bg-2.png' with the path to your image -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>