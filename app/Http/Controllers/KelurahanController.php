<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class KelurahanController extends Controller
{
    // Mengambil seluruh data dari database melalui Model
    public function dataPenduduk(){
    $warga = Penduduk::all();
    return view('penduduk_index', compact('warga'));
    }
}
