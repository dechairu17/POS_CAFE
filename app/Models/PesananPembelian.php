<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananPembelian extends Model
{
    use HasFactory;
    protected $table = 'pesanan_pembelian';
    protected $fillable = ['id_pemasok', 'id_gudang', 'id_pengguna', 'tgl_pesanan', 'total_biaya', 'status'];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'id_pemasok');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function detail()
    {
        return $this->hasMany(DetailPesananPembelian::class, 'id_pesanan_pembelian');
    }
}