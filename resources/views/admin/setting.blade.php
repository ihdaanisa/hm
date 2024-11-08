<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Settings - Lapor Pak</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Lapor Pak</h2>
            <nav>
                <a href="index.html"><i class="icon">🏠</i> Dashboard</a>
                <a href="laporan.html"><i class="icon">📄</i> Reports</a>
                <a href="user.html"><i class="icon">👤</i> Users</a>
                <a href="setting.html" class="active"><i class="icon">⚙️</i> Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header>
                <div class="header-left">
                    <h1>Settings</h1>
                    <p class="date">Wednesday, November 6, 2024</p>
                </div>
                <div class="profile-section">
                    <i class="notifications">🔔</i>
                    <div class="profile">
                        <img src="profile.jpg" alt="Profile Picture">
                        <span>Admin</span>
                    </div>
                </div>
            </header>

            <!-- Modern Settings Section -->
            <section class="settings-section">
                <h2>Account Settings</h2>
                <div class="settings-card">
                    <!-- Profile Information -->
                    <h3>Profile Information</h3>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="Admin">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="admin@example.com">
                    </div>
                </div>

                <div class="settings-card">
                    <!-- Password Update -->
                    <h3>Change Password</h3>
                    <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" id="currentPassword" name="currentPassword"
                            placeholder="Enter current password">
                    </div>

                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" id="newPassword" name="newPassword" placeholder="Enter new password">
                        <small class="hint">Use at least 8 characters with a mix of letters, numbers, and
                            symbols.</small>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword"
                            placeholder="Confirm new password">
                    </div>
                </div>

                <div class="settings-card">
                    <!-- Notification Preferences -->
                    <h3>Notification Preferences</h3>
                    <div class="form-group switch-group">
                        <label>Email Notifications</label>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="form-group switch-group">
                        <label>SMS Notifications</label>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>

                <!-- Save Button -->
                <button type="submit" class="btn save">Save Changes</button>
            </section>
        </div>
    </div>

    <style>
        /* Modern Settings styling */
        .settings-section {
            max-width: 600px;
            margin-top: 20px;
        }

        .settings-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .settings-card h3 {
            font-size: 20px;
            color: #1e3a8a;
            margin-bottom: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
        }

        .hint {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }

        /* Toggle Switch Styling */
        .switch-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 42px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        .switch input:checked+.slider {
            background-color: #2563eb;
        }

        .switch input:checked+.slider:before {
            transform: translateX(18px);
        }

        /* Save Button Styling */
        .btn.save {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
            font-weight: bold;
        }

        .btn.save:hover {
            background-color: #1d4ed8;
        }
    </style>

    <script>
        document.querySelector('.btn.save').addEventListener('click', function (event) {
            event.preventDefault();
            alert('Settings have been saved successfully!');
        });
    </script>
</body>

</html>