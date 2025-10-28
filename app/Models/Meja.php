<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = 'meja';
    protected $fillable = ['nama', 'status'];

    public function pesananPenjualan()
    {
        return $this->hasMany(PesananPenjualan::class, 'id_meja');
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id_meja');
    }
}