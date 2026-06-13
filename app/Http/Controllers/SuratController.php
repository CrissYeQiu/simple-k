<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Surat;


class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager Loading relasi penduduk untuk menghemat query
        $semuaSurat = Surat::with('penduduk')->get();
        return view('surat.index', compact('semuaSurat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil data penduduk untuk pilihan dropdown di form
        $penduduk = Penduduk::all();
        return view('surat.create', compact('penduduk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Eksekusi Aturan Validasi Server-Side
        $validatedData = $request->validate([
        'nomor_surat' => 'required|unique:surats,nomor_surat|max:50',
        'jenis_surat' => 'required',
        'penduduk_id' => 'required|numeric',
        'tanggal_ajuan' => 'required|date',
        ], [
        'nomor_surat.required' => 'Nomor surat wajib diisi.',
        'nomor_surat.unique' => 'Nomor surat tersebut sudah terdaftar di sistem.',
        'jenis_surat.required' => 'Silakan pilih jenis surat.',
        'penduduk_id.required' => 'Warga pemohon wajib dipilih.',
        ]);

        // 2. Simpan ke Database Menggunakan Mass Assignment Eloquent
        Surat::create($validatedData);

        // 3. Redirect dengan Flash Session
        return redirect()->route('surat.index')->with('sukses', 'Surat permohonan berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil data surat berdasarkan ID, lemparkan error 404 jika data tidak ditemukan
        $surat = Surat::findOrFail($id);
    
        // Kirim data surat ke view edit menggunakan fungsi compact
        return view('surat.edit', compact('surat'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $surat = Surat::findOrFail($id);

        // Jalankan aturan validasi data server-side
        $validatedData = $request->validate([
            'nomor_surat' => 'required|max:50|unique:surats,nomor_surat,' . $surat->id,
            'jenis_surat' => 'required',
            'tanggal_ajuan' => 'required|date'
        ], [
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'nomor_surat.unique' => 'Nomor surat ini telah terdaftar pada sistem.'
        ]);

        // Update entitas data menggunakan fungsi update Eloquent
        $surat->update($validatedData);

        // Alihkan halaman ke indeks tabel utama disertai pesan kilat (flash message) sukses
        return redirect()->route('surat.index')->with('sukses', 'Data surat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          // Cari objek data surat berdasarkan ID penunjuk
        $surat = Surat::findOrFail($id);

        // Eksekusi fungsi delete bawaan Eloquent ORM
        $surat->delete();

        // Kembalikan ke halaman index dengan alert flash message pemberitahuan
        return redirect()->route('surat.index')->with('sukses', 'Data surat berhasil dihapus dari sistem.');
    }
}
