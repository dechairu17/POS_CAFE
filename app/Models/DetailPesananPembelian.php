<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesananPembelian extends Model
{
    use HasFactory;
    protected $table = 'detail_pesanan_pembelian';
    protected $fillable = ['id_pesanan_pembelian', 'id_bahan_baku', 'jumlah', 'biaya_per_unit'];

    // Nonaktifkan timestamps karena tidak ada di migrasi
    public $timestamps = true;

    public function pesananPembelian()
    {
        return $this->belongsTo(PesananPembelian::class, 'id_pesanan_pembelian');
    }

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'id_bahan_baku');
    }
}