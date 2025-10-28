<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = ['id_kategori', 'nama', 'harga_jual', 'gambar', 'tersedia'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function detailPesananPenjualan()
    {
        return $this->hasMany(DetailPesananPenjualan::class, 'id_produk');
    }

    // Relasi Many-to-Many ke BahanBaku via 'resep_produk'
    public function bahanBaku()
    {
        return $this->belongsToMany(BahanBaku::class, 'resep_produk', 'id_produk', 'id_bahan_baku')
                    ->withPivot('jumlah_dipakai'); // Penting untuk mengambil data resep
    }
}