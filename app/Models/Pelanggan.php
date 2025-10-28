<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = ['nama', 'nomor_telepon', 'email', 'tgl_bergabung'];

    public function pesananPenjualan()
    {
        return $this->hasMany(PesananPenjualan::class, 'id_pelanggan');
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id_pelanggan');
    }
}