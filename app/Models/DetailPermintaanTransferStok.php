<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPermintaanTransferStok extends Model
{
    use HasFactory;
    protected $table = 'detail_permintaan_transfer_stok';
    protected $fillable = ['id_permintaan', 'id_bahan_baku', 'jumlah_diminta'];

    // Nonaktifkan timestamps
    public $timestamps = true;

    public function permintaanTransferStok()
    {
        return $this->belongsTo(PermintaanTransferStok::class, 'id_permintaan');
    }

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'id_bahan_baku');
    }
}