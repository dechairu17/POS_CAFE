<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananPenjualan extends Model
{
    use HasFactory;
    protected $table = 'pesanan_penjualan';
    protected $fillable = [
        'id_pengguna', 'id_pelanggan', 'id_meja', 'id_gudang', 'nomor_faktur', 
        'subtotal', 'total_diskon', 'total_akhir', 'metode_bayar', 'status'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang');
    }

    public function detail()
    {
        return $this->hasMany(DetailPesananPenjualan::class, 'id_pesanan_penjualan');
    }

    // Relasi Many-to-Many ke Promosi via 'promosi_pesanan'
    public function promosi()
    {
        return $this->belongsToMany(Promosi::class, 'promosi_pesanan', 'id_pesanan_penjualan', 'id_promosi')
                    ->withPivot('diskon_diterapkan');
    }
}