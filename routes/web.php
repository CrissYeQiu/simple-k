<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\KelurahanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/penduduk', [KelurahanController::class, 'dataPenduduk']);