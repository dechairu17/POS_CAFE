<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesananPenjualan extends Model
{
    use HasFactory;
    protected $table = 'detail_pesanan_penjualan';
    protected $fillable = ['id_pesanan_penjualan', 'id_produk', 'jumlah', 'harga_saat_jual'];

    // Nonaktifkan timestamps
    public $timestamps = true;

    public function pesananPenjualan()
    {
        return $this->belongsTo(PesananPenjualan::class, 'id_pesanan_penjualan');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}