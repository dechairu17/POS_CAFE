<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBahanBaku extends Model
{
    use HasFactory;
    protected $table = 'stok_bahan_baku';
    protected $fillable = ['id_gudang', 'id_bahan_baku', 'jumlah_stok'];

    // Nonaktifkan timestamps
    public $timestamps = false;

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang');
    }

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'id_bahan_baku');
    }
}