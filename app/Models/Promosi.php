<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    use HasFactory;
    protected $table = 'promosi';
    protected $fillable = ['nama', 'tipe', 'nilai', 'kode', 'tgl_mulai', 'tgl_selesai', 'aktif'];

    // Relasi Many-to-Many ke PesananPenjualan via 'promosi_pesanan'
    public function pesananPenjualan()
    {
        return $this->belongsToMany(PesananPenjualan::class, 'promosi_pesanan', 'id_promosi', 'id_pesanan_penjualan')
                    ->withPivot('diskon_diterapkan');
    }
}