<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pengguna';
    

    protected $fillable = ['id_peran', 'id_gudang', 'nama_lengkap', 'username'];

    protected $hidden = ['kata_sandi'];


    public function getAuthPasswordName()
    {
        return 'kata_sandi';
    }
    
    public function peran()
    {
        return $this->belongsTo(Peran::class, 'id_peran');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang');
    }

    public function shift()
    {
        return $this->hasMany(Shift::class, 'id_pengguna');
    }

    public function pesananPembelian()
    {
        return $this->hasMany(PesananPembelian::class, 'id_pengguna');
    }

    public function pesananPenjualan()
    {
        return $this->hasMany(PesananPenjualan::class, 'id_pengguna');
    }

    public function permintaanTransferStok()
    {
        return $this->hasMany(PermintaanTransferStok::class, 'id_pengguna_peminta');
    }
}