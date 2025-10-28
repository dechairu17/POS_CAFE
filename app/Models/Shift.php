<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $table = 'shift';
    protected $fillable = [
        'id_pengguna', 'waktu_mulai', 'waktu_selesai', 
        'uang_awal', 'uang_akhir', 'total_penjualan_sistem'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}