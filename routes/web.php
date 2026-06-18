<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\KelurahanController;
use App\http\controllers\SuratController;
use App\http\controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
// Route untuk simple.k/penduduk
Route::get('/penduduk', [KelurahanController::class, 'dataPenduduk']);

// Route untuk simple.k/surat
// Sudah menggunakan Routingnya resources otomatis
// Route::get('/surat', [KelurahanController::class, 'daftarSurat']);

// Routing Resources
Route::resource('surat', SuratController::class);

// Group 1: Isolasi Keamanan Khusus untuk Pengunjung Tamu (Belum Login)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('login.auth');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');
});
 
// Group 2: Isolasi Keamanan Khusus untuk Pengguna yang Telah Sukses Terautentikasi
Route::middleware(['auth'])->group(function () {
    // // Penanganan Aksi Keluar Aplikasi
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
 
    // // Proteksi Total Rute CRUD Surat Aplikasi Simpel-K dari Serangan Manipulasi Tembak URL
    Route::resource('surat', SuratController::class);
});
