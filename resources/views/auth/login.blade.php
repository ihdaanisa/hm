<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .left-section {
        background-color: #004085; 
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .left-section-content {
        text-align: center;
        z-index: 2;
    }

    /* Style for the small image */
    .left-section-content img {
        max-width: 380px; /* Adjust size as needed */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
        .right-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-form-container h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .login-form-container .form-group label {
            font-weight: bold;
        }
        .login-form-container .btn {
            background-color: #004085;
            color: #ffffff;
            width: 100%;
            margin-top: 20px;
        }
        .login-form-container .text-center {
            margin-top: 15px;
            font-size: 14px;
        }
        .login-form-container .text-center a {
            color: #004085;
            font-weight: bold;
            text-decoration: none;
        }
        .login-form-container .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="row m-0">
        <!-- Left section with blue background and centered image -->
        <div class="col-md-6 left-section">
            <div class="left-section-content">
                <img src="images/hero-bg 1.png" alt="Small Image"> <!-- Replace 'your-image-url.jpg' with the path to your image -->
            </div>
        </div>
        
        <!-- Right section with login form -->
        <div class="col-md-6 right-section">
            <div class="login-form-container">
                <h2>Masuk ke Akun</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="ihda@gmail.com">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
                    </div>
                    <div class="text-right mb-3">
                        <a href="#" style="color: #004085;">Lupa password?</a>
                    </div>
                    <button type="submit" class="btn">Masuk</button>
                </form>
                <p class="text-center">Belum Punya Akun? <a href="{{ route('register') }}">Daftar Akun</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

