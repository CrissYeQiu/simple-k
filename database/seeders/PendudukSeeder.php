<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Penduduk;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penduduk::create([
        'nik' => '3507123456780001',
        'nama' => 'Budi Santoso',
        'jk' => 'L',
        'alamat' => 'Jl. Merdeka No. 10, RT 01 RW 01'
        ]);

        Penduduk::create([
        'nik' => '3507123456780002',
        'nama' => 'Soekarto',
        'jk' => 'L',
        'alamat' => 'Jl. Ampel Gading No. 10, RT 11 RW 51'
        ]);

        Penduduk::create([
        'nik' => '3507123456780005',
        'nama' => 'Aisyah Maimunah',
        'jk' => 'P',
        'alamat' => 'Jl. Mawar No. 51, RT 14 RW 44'
        ]);
    }

    

}
