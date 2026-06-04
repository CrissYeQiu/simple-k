<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\KelurahanController;

Route::get('/', function () {
    return view('welcome');
});
// Route untuk simple.k/penduduk
Route::get('/penduduk', [KelurahanController::class, 'dataPenduduk']);

// Route untuk simple.k/surat
Route::get('/surat', [KelurahanController::class, 'daftarSurat']);