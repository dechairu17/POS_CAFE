<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;
    protected $table = 'pemasok';
    protected $fillable = ['nama', 'narahubung', 'telepon', 'alamat'];

    public function pesananPembelian()
    {
        return $this->hasMany(PesananPembelian::class, 'id_pemasok');
    }
}