<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $table = 'gudang';
    protected $fillable = ['nama', 'dapur_pusat', 'alamat'];

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'id_gudang');
    }

    public function stokBahanBaku()
    {
        return $this->hasMany(StokBahanBaku::class, 'id_gudang');
    }

    public function pesananPembelian()
    {
        return $this->hasMany(PesananPembelian::class, 'id_gudang');
    }

    public function pesananPenjualan()
    {
        return $this->hasMany(PesananPenjualan::class, 'id_gudang');
    }

    // Transfer KELUAR dari gudang ini
    public function transferKeluar()
    {
        return $this->hasMany(PermintaanTransferStok::class, 'dari_id_gudang');
    }

    // Transfer MASUK ke gudang ini
    public function transferMasuk()
    {
        return $this->hasMany(PermintaanTransferStok::class, 'ke_id_gudang');
    }
}