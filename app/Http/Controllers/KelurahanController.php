<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Surat;
use App\Models\User;

class KelurahanController extends Controller
{
    // Mengambil seluruh data dari database melalui Model
    public function dataPenduduk(){
    $warga = Penduduk::all();
    $user = User::all();
    return view('penduduk_index', compact('warga', 'user'));
    }
}
