<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;
use App\Models\Penduduk;
class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil sampel penduduk pertama dari database
        $warga1 = Penduduk::first();
        if ($warga1) {
         Surat::create([
            'nomor_surat' => '001/MK/2026',
            'jenis_surat' => 'Surat Keterangan Usaha (SKU)',
            'tanggal_ajuan' => '2026-05-15',
            'penduduk_id' => $warga1->id
         ]);
         Surat::create([
            'nomor_surat' => '002/MK/2026',
            'jenis_surat' => 'Surat Pengantar SKCK',
            'tanggal_ajuan' => '2026-05-18',
            'penduduk_id' => $warga1->id
         ]);
        }
    }
}
