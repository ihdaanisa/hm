<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
// Data Laporan page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/kontakhome', function () {
    return view('kontakhome'); // Replace 'kontak' with your actual view for "Kontak"
})->name('kontakhome');

// Route untuk masing-masing dashboard berdasarkan role
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard/user', [UserController::class, 'dashboard'])->name('user.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');
    Route::get('/admin/reports', [ReportController::class, 'adminIndex'])->name('reports.index');
    
    // Admin route to update a report's status or response
    Route::patch('/admin/reports/{id}', [ReportController::class, 'update'])->name('reports.update');
});


Route::middleware(['auth', 'role:perusahaan'])->group(function () {
    Route::get('/dashboard/perusahaan', [PerusahaanController::class, 'dashboard'])->name('perusahaan.dashboard');
});

// Landing Page


// Rute Authentication
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute Registration
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

// Rute yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
  
    // Rute untuk profil
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.user'); // Route untuk daftar user admin// Rute tambahan
    Route::get('/tentang-kami', [UserController::class, 'tentangKami'])->name('tentangKami');
    Route::get('/laporan', [UserController::class, 'laporan'])->name('laporan');
    Route::get('/kontak', [UserController::class, 'kontak'])->name('kontak');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/report/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/report/store', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/data-laporan', [ReportController::class, 'index'])->name('dataLaporan');
    Route::get('/report/{id}', [ReportController::class, 'show'])->name('reports.show'); // Add this route
    // Route to edit the report
Route::get('/report/{id}/edit', [ReportController::class, 'edit'])->name('reports.edit');
Route::delete('/report/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');
});


