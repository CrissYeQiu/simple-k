<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat', 50)->unique();
            $table->string('jenis_surat', 100); // Contoh SKU, SKTM, Domisili
            $table->date('tanggal_ajuan');
            $table->timestamps();
            // Membuat Foreign Key yang terhubung otomatis ke tabel penduduks
            $table->foreignID('penduduk_id')->constrained('penduduks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
