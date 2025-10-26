<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermintaanTransferStokSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('permintaan_transfer_stok')->insert([
            [
                'dari_id_gudang' => 1, // Dapur Pusat
                'ke_id_gudang' => 2, // Outlet Surabaya
                'id_pengguna_peminta' => 2, // Manajer Ani
                'status' => 'diterima',
                'created_at' => now()->subDays(1), 'updated_at' => now()
            ]
        ]);
    }
}