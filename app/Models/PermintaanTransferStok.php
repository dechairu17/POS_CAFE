<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanTransferStok extends Model
{
    use HasFactory;
    protected $table = 'permintaan_transfer_stok';
    protected $fillable = ['dari_id_gudang', 'ke_id_gudang', 'id_pengguna_peminta', 'status'];

    // Relasi untuk gudang PENGIRIM
    public function dariGudang()
    {
        return $this->belongsTo(Gudang::class, 'dari_id_gudang');
    }

    // Relasi untuk gudang PENERIMA
    public function keGudang()
    {
        return $this->belongsTo(Gudang::class, 'ke_id_gudang');
    }

    public function penggunaPeminta()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna_peminta');
    }

    public function detail()
    {
        return $this->hasMany(DetailPermintaanTransferStok::class, 'id_permintaan');
    }
}