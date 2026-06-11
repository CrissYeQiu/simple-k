<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\KelurahanController;

use App\http\controllers\SuratController;

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