<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAdmin;
use App\Http\Controllers\ControllerResetPasswordAdmin;

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/forgot-password', [ControllerResetPasswordAdmin::class, 'showForgotPasswordForm'])->name('admin.password.request');
Route::post('/admin/forgot-password', [ControllerResetPasswordAdmin::class, 'sendResetLink'])->name('admin.password.email');
Route::get('/admin/reset-password/{token}', [ControllerResetPasswordAdmin::class, 'showResetForm'])->name('admin.password.reset');
Route::post('/admin/reset-password', [ControllerResetPasswordAdmin::class, 'resetPassword'])->name('admin.password.update');

// Middleware untuk tamu (belum login)
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/admin/login', [ControllerAdmin::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [ControllerAdmin::class, 'login'])->name('admin.login.post');
    Route::get('/admin/register', [ControllerAdmin::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/admin/register', [ControllerAdmin::class, 'register'])->name('admin.register.post');
    Route::get('/admin/forgot-password', function () {
        return view('admin.forgot-password'); // Buat halaman reset password
    })->name('admin.password.request');
});

// Middleware untuk admin yang sudah login
Route::middleware(['auth:admin'])->group(function () {
    Route::post('/admin/logout', [ControllerAdmin::class, 'logout'])->name('admin.logout');
    
    Route::get('/admin/dashboard', [ControllerAdmin::class, 'dashboard'])->name('admin.dashboard');

    // 🔥 Pindahkan route profile ke atas sebelum /admin/{id}
    Route::get('/admin/profile', [ControllerAdmin::class, 'profile'])->name('admin.profile');

    // Manajemen admin (tanpa DataTables/AJAX)
    Route::get('/admin', [ControllerAdmin::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [ControllerAdmin::class, 'create'])->name('admin.create');
    Route::post('/admin', [ControllerAdmin::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}', [ControllerAdmin::class, 'show'])->name('admin.show');
    Route::get('/admin/{id}/edit', [ControllerAdmin::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [ControllerAdmin::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [ControllerAdmin::class, 'destroy'])->name('admin.destroy');

    // Persetujuan admin
    Route::post('/admin/{id}/approve', [ControllerAdmin::class, 'approve'])->name('admin.approve');
    Route::post('/admin/{id}/reject', [ControllerAdmin::class, 'reject'])->name('admin.reject');


    // Manajemen pegawai (tanpa DataTables/AJAX)
Route::get('/pegawai', [ControllerPegawai::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [ControllerPegawai::class, 'create'])->name('pegawai.create');
Route::post('/pegawai', [ControllerPegawai::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/{id}', [ControllerPegawai::class, 'show'])->name('pegawai.show');
Route::get('/pegawai/{id}/edit', [ControllerPegawai::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/{id}', [ControllerPegawai::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{id}', [ControllerPegawai::class, 'destroy'])->name('pegawai.destroy');

// Persetujuan pegawai
Route::post('/pegawai/{id}/approve', [ControllerPegawai::class, 'approve'])->name('pegawai.approve');
Route::post('/pegawai/{id}/reject', [ControllerPegawai::class, 'reject'])->name('pegawai.reject');

});