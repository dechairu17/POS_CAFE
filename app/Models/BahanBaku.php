<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku';
    protected $fillable = ['nama', 'satuan', 'harga_beli_default'];

    // Relasi Many-to-Many ke Produk via 'resep_produk'
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'resep_produk', 'id_bahan_baku', 'id_produk')
                    ->withPivot('jumlah_dipakai');
    }
    
    public function stokDiGudang()
    {
        return $this->hasMany(StokBahanBaku::class, 'id_bahan_baku');
    }

    public function detailPesananPembelian()
    {
        return $this->hasMany(DetailPesananPembelian::class, 'id_bahan_baku');
    }

    public function detailPermintaanTransferStok()
    {
        return $this->hasMany(DetailPermintaanTransferStok::class, 'id_bahan_baku');
    }
}