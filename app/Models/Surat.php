<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Surat extends Model
{
protected $fillable = ['nik', 'nama', 'jk', 'alamat'];
// Relasi: Surat dimiliki oleh Penduduk
public function penduduk(): BelongsTo
{
return $this->belongsTo(Penduduk::class);
}
}