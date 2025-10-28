<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $fillable = ['id_pelanggan', 'id_meja', 'waktu_reservasi', 'jumlah_orang', 'status', 'catatan'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja');
    }
}